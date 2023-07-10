<?php
namespace App\Wpcreator\Domain\Parser;

class ParserTypeFactory {
    public static function create(string $file_type) {
        return [
            "yaml" => new YAMLParser(),
        ][$file_type];
    }

}