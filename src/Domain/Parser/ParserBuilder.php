<?php
namespace App\Wpcreator\Domain\Parser;


class ParserBuilder {

    private IParserStrategy $parser;

    public function file($path) {
        $extension = substr($path, strrpos($path, ".") + 1);
        $this->parser = ParserTypeFactory::create($extension);
        $this->parser->set_file($path); 
        return $this;
    }

    public function loadData($data, $data_type){
        $this->parser = ParserTypeFactory::create($data_type);
        $this->parser->set_data($data);
        return $this;
    }

    public function build(){
        return $this->parser;
    }
}