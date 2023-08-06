<?php 
namespace App\Wpcreator\Services;
use Symfony\Component\Yaml\Yaml;
use App\Wpcreator\Domain\Parser;
use App\Wpcreator\Domain\Parser\ParserBuilder;
use Symfony\Component\Console\Style\SymfonyStyle;

class CPT {

    protected $baseFile = __DIR__ . '/Files/CPT/cpt_base.php';
    protected $taxonomyFile = __DIR__ . '/Files/CPT/cpt_taxonomy.php';
    protected $metaboxFile = __DIR__ . '/Files/CPT/cpt_register_metabox.php';
    protected $metaboxAdd = __DIR__ . '/Files/CPT/metaboxes/metabox_add.php';
    protected $metaboxRender = __DIR__ . '/Files/CPT/metaboxes/metabox_render.php';
    protected $metaboxPostmetas = __DIR__ . '/Files/CPT/metaboxes/metabox_postmetas.php';
    protected $inputs = __DIR__ . '/Files/CPT/metaboxes/inputs.php';
    protected $outputFile = null;
    protected $supports = [];
    protected $name = '';

    public function __construct(protected SymfonyStyle $io)
    {
        
    }

    public function createCpt(string $file_path) : bool
    {
        $this->io->section("Parsing File");

        $data = $this->parseFile($file_path);

        if (!isset($data['name'])) {
            $this->io->error("Falha ao criar CPT!"); 
            $this->io->text("Nome não encontrado no arquivo yaml.");
            return false;
        }

        $this->name = $data['name'];

        $this->getSupports($data);

        $this->io->text("Ok!");
        $this->io->section("Creating File");

        $this->createOutputFile($this->name);

        $this->io->text("Ok!");
        $this->io->section("Customazing Base Data");

        if($this->exchangeBaseData()) {
            $this->io->text("Ok!");

            $this->io->section("Saving File");
            $this->io->text("Ok!");

        } else {
            $this->io->error("Falha ao criar CPT.");
            return false;
        }

        if($data['taxonomies'] && !empty($data['taxonomies'])){
            $this->io->section("Registrando Taxonomias");

            $this->registerTaxonomies($data);

            $this->io->text("Ok!");
        }

        if($data['metaboxes'] && !empty($data['metaboxes'])){
            $this->io->section("Registrando Metaboxes");

            $this->registerMetaboxes($data);
            $this->addMetaBoxes($data);
            $this->renderMetaBoxes($data);

            $this->io->text("Ok!");
        }

        $this->io->success("CPT {$this->name} criado.");
        return true;
        
    }
    
    protected function parseFile($file): array
    {
        $parserBuilder = new ParserBuilder();
        $parser = $parserBuilder->file($file)->build();
        return  $parser->parse();
    }

    protected function createOutputFile($name): void
    {
        $outputFolder = 'output';
        $outputFileName = $name .'.php';

        if (!file_exists($outputFolder)) {
            mkdir($outputFolder, 0777, true);
        }

        $this->outputFile = $outputFolder . DIRECTORY_SEPARATOR . $outputFileName;
    }

    protected function getSupports($data): void
    {
        $supports = explode(' ', $data['supports']);

        foreach($supports as $x => $support) {
            $supports[$x] = "'{$support}'";
        }

        $this->supports = $supports;
    }

    protected function exchangeBaseData(): bool
    {
        if (copy($this->baseFile, $this->outputFile)) {

            $fileContents = file_get_contents($this->outputFile);

            $fileContents = str_replace('__PLURAL_NAME__', $this->name, $fileContents);
            $fileContents = str_replace('__SINGULAR_NAME__', $data['labels']['singular'] ?? ucfirst($this->name), $fileContents);
            $fileContents = str_replace('__SINGULAR_NAME__', $data['labels']['plural'] ?? ucfirst($this->name), $fileContents);
            $fileContents = str_replace('__MENU_NAME__', $data['labels']['menuName'] ?? ucfirst($this->name), $fileContents);
            $fileContents = str_replace('__SUPPORTS__', implode(", ", $this->supports) ?? implode(", ", array('')), $fileContents);
            $fileContents = str_replace('__SLUG__', $data['slug'] ?? strtolower($this->name), $fileContents);
            $fileContents = str_replace('__TEXTDOMAIN__', $data['textdomain'] ?? 'textdomain', $fileContents);
            file_put_contents($this->outputFile, $fileContents);
            return true;
        } else {
            return false;
        }
    }

    protected function registerTaxonomies($data): void
    {
        $fileContents = file_get_contents($this->taxonomyFile);

        $taxonomies = '//register_taxonomies'. PHP_EOL;

        foreach($data['taxonomies'] as $taxonomy) {
            $contents = $fileContents;
            $this->io->text("Registrando {$taxonomy['name']}");
            $contents = str_replace('__PLURAL_TAX__', $taxonomy['plural'], $contents);
            $contents = str_replace('__SINGULAR_TAX__', $taxonomy['singular'] ?? ucfirst($taxonomy['name']), $contents);
            $contents = str_replace('__SLUG_TAX__', $taxonomy['slug'] ?? strtolower($taxonomy['name']), $contents);
            $contents = str_replace('__HIERARCHICAL__', $taxonomy['hierarchical'] ?? 'true', $contents);
            $contents = str_replace('__SLUG__', $data['slug'], $contents);
            $taxonomies.=$contents . PHP_EOL . PHP_EOL;
        }

        $outputFile = file_get_contents($this->outputFile);

        $novoConteudo = str_replace('//register_taxonomies', $taxonomies, $outputFile);

        file_put_contents($this->outputFile, $novoConteudo);
    }

    protected function registerMetaboxes($data): void
    {
        $metaboxRegister = file_get_contents($this->metaboxFile);

        $metaboxes = '//register_metaboxes'. PHP_EOL . $metaboxRegister;

        $metaboxes = str_replace('__SINGULAR_NAME__', $data['labels']['singular'] ?? ucfirst($this->name), $metaboxes);

        $outputFile = file_get_contents($this->outputFile);

        $novoConteudo = str_replace('//register_metaboxes', $metaboxes, $outputFile);

        file_put_contents($this->outputFile, $novoConteudo);
    }

    protected function addMetaBoxes($data): void
    {
        $addMetas = file_get_contents($this->metaboxAdd);

        $metaboxes = '//add_meta_boxes'. PHP_EOL;

        foreach($data['metaboxes'] as $metabox){
            $this->io->text("Registrando {$metabox['title']}");
            $contents = $addMetas;
            $contents = str_replace('__NAME__', $metabox['name'], $contents);
            $contents = str_replace('__TITLE__', $metabox['title'], $contents);
            $contents = str_replace('__SLUG__', $data['slug'], $contents);

            $metaboxes.=$contents . PHP_EOL . PHP_EOL;
        }

        $outputFile = file_get_contents($this->outputFile);

        $novoConteudo = str_replace('//add_meta_boxes', $metaboxes, $outputFile);

        file_put_contents($this->outputFile, $novoConteudo);
    }

    protected function renderMetaBoxes($data): void
    {
        $metaboxRender = file_get_contents($this->metaboxRender);
        $inputs = file_get_contents($this->inputs);

        $metaboxes = '//add_meta_boxes'. PHP_EOL;

        foreach($data['metaboxes'] as $metabox){
            $this->io->text("Renderizando {$metabox['title']}");
            $contents = $metaboxRender;
            $contents = str_replace('__NAME__', $metabox['name'], $contents);

            $listInputs = '//inputs'. PHP_EOL;
            foreach($metabox['postmetas'] as $input){
                $addInput = $inputs;
                $addInput = str_replace("__ID__", $input['id'], $addInput);
                $addInput = str_replace("__LABEL__", $input['label'], $addInput);
                $addInput = str_replace("__TYPE__", $input['type'], $addInput);
                $addInput.=PHP_EOL;
                $listInputs.=$addInput;
            }
            $contents = str_replace('//inputs', $listInputs, $contents);

            $metaboxes.=$contents . PHP_EOL . PHP_EOL;
        }

        $outputFile = file_get_contents($this->outputFile);

        $novoConteudo = str_replace('//render_metaboxes', $metaboxes, $outputFile);

        file_put_contents($this->outputFile, $novoConteudo);
    }

}