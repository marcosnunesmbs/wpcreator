<?php 
namespace App\Wpcreator\Services;
use Symfony\Component\Yaml\Yaml;

class CPT {
    public static function createCpt(string $yaml) : bool
    {
        $data = Yaml::parseFile($yaml);
        if (!isset($data['name'])) {
            echo "Falha ao criar CPT!" . PHP_EOL;
            echo "Nome não encontrado no arquivo yaml." . PHP_EOL;
            return false;
        }
        $name = $data['name'];
        $supports = explode(' ', $data['supports']);

        foreach($supports as $x => $support) {
            $supports[$x] = "'{$support}'";
        }

        $baseFile = __DIR__ . '/Files/CPT/cpt_base.php';
        $taxonomyFile = __DIR__ . '/Files/CPT/cpt_taxonomy.php';

        $outputFolder = 'output';
        $outputFileName = $name .'.php';

        if (!file_exists($outputFolder)) {
            mkdir($outputFolder, 0777, true);
        }
        $outputFile = $outputFolder . DIRECTORY_SEPARATOR . $outputFileName;
        if (copy($baseFile, $outputFile)) {

            $fileContents = file_get_contents($outputFile);

            $fileContents = str_replace('__PLURAL_NAME__', $name, $fileContents);
            $fileContents = str_replace('__SINGULAR_NAME__', $data['labels']['singular'] ?? ucfirst($name), $fileContents);
            $fileContents = str_replace('__SINGULAR_NAME__', $data['labels']['plural'] ?? ucfirst($name), $fileContents);
            $fileContents = str_replace('__MENU_NAME__', $data['labels']['menuName'] ?? ucfirst($name), $fileContents);
            $fileContents = str_replace('__SUPPORTS__', implode(", ", $supports) ?? implode(", ", array('')), $fileContents);
            $fileContents = str_replace('__SLUG__', $data['slug'] ?? strtolower($name), $fileContents);
            $fileContents = str_replace('__TEXTDOMAIN__', $data['textdomain'] ?? 'textdomain', $fileContents);

            $fileContents .= str_replace('<?php', PHP_EOL, file_get_contents($taxonomyFile));

            file_put_contents($outputFile, $fileContents);

            echo "CPT {$name} criado." . PHP_EOL;
            return true;
        } else {
            echo "Falha ao criar CPT." . PHP_EOL;
            return false;
        }
        
    }
}