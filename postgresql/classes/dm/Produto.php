<?php

class Produto{
    private $data;

    public function __get($name){
        return $this->data[$name];
    }

    public function __set($name, $value){
        $this->data[$name] = $value;
    }
}