<?php

namespace App\Wpcreator\Domain\Parser;


class JSONParser implements IParserStrategy {

    private $path;
    private $data;

    public function set_file(string $path): void{
        $this->path = $path;
    }

    public function set_data(string $data): void{
        $this->$data = $data;
    }

    public function parse() {
        $file = fopen($this->path, "r");
        $data = fread($file, filesize($this->path));
        return json_decode($data, true);
        // TODO: Create a way to accept both file and direct data from CLI
        // return array_merge(Yaml::parse($this->data), Yaml::parseFile($this->path));
    }
}