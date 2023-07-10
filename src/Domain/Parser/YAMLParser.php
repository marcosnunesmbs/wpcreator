<?php

namespace App\Wpcreator\Domain\Parser;
use Symfony\Component\Yaml\Yaml;


class YAMLParser implements IParserStrategy {

    private $path;
    private $data;

    public function set_file(string $path): void{
        $this->path = $path;
    }

    public function set_data(string $data): void{
        $this->$data = $data;
    }

    public function parse() {
        return Yaml::parseFile($this->path);
        // TODO: Create a way to accept both file and direct data from CLI
        // return array_merge(Yaml::parse($this->data), Yaml::parseFile($this->path));
    }
}