<?php

class Servico implements OrcavelInterface {

    private $descricao;
    private $preco;

    function __construct($descricao, $preco) {
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }
    
    public function  getDescricao(){
        return $this->descricao;
    }

}
