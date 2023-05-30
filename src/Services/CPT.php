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

        $sourceFile = __DIR__ . '/Files/CPT/cpt_mockup.php';
        $targetFolder = 'output';
        $targetFileName = $name .'.php';

        if (!file_exists($targetFolder)) {
            mkdir($targetFolder, 0777, true);
        }
        $targetFile = $targetFolder . DIRECTORY_SEPARATOR . $targetFileName;
        if (copy($sourceFile, $targetFile)) {

            $fileContents = file_get_contents($targetFile);

            $fileContents = str_replace('%PLURAL_NAME%', $name, $fileContents);
            $fileContents = str_replace('%SINGULAR_NAME%', $data['singular'] ?: ucfirst($name), $fileContents);
            $fileContents = str_replace('%SINGULAR_NAME%', $data['plural'] ?: ucfirst($name), $fileContents);
            $fileContents = str_replace('%SUPPORTS%', implode(", ", $supports) ?: implode(", ", array('')), $fileContents);
            $fileContents = str_replace('%SLUG%', $data['slug'] ?: strtolower($name), $fileContents);

            file_put_contents($targetFile, $fileContents);

            echo "CPT {$name} criado." . PHP_EOL;
            return true;
        } else {
            echo "Falha ao criar CPT." . PHP_EOL;
            return false;
        }
        
    }
}