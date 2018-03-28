<?php

/**
 * 
 */
class Fabricante {

    private $nome;
    private $endereco;
    private $documento;

    function __construct($nome, $endereco, $documento) {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->documento = $documento;
    }

    public function getNome() {
        return $this->nome;
    }

}