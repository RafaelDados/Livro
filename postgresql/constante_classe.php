<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of constante_classe
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class Pessoa {
    private $nome;
    private $genero;
    const GENEROS = array('M'=>'Masculino', 'F'=>'Feminino');
    
    function __construct($nome, $genero) {
        $this->nome = $nome;
        $this->genero = $genero;
    }

    public function getNome(){
        return $this->nome;
    }
    
    public function getNomeGenereno(){
        return self::GENEROS[$this->genero];
    }    
}

$p1 = new Pessoa("Luiza", 'F');
$p2 = new Pessoa("Rafael Almeida", 'M');

print 'Nome: '.$p1->getNome()."<br>";
print 'Genero: '.$p1->getNomeGenereno()."<br>";
print 'Nome: '.$p2->getNome()."<br>";
print 'Genero: '.$p2->getNomeGenereno()."<br>";

print_r(Pessoa::GENEROS);
