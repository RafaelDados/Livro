<?php

abstract class Logger{
    protected $filename;

    public function __construct($filename){
        $this->filename = $filename;
        file_put_contents($filename, ''); //limpa o conteúdo do arquivo
    }

    abstract function write($message);
}