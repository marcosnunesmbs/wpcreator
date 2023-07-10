<?php

namespace App\Wpcreator\Domain\Parser;

interface IParserStrategy {
    public function set_file(string $path): void;
    public function set_data(string $data): void;
    public function parse();
}