<?php

class Titulo {
    private $dt_vencimento, $valor, $juros, $multa;
    
    public function __get($propriedade) {
        print "Tentou acessar '{$propriedade}' inacessível. Use getValor()<br>\n";
        return 0;
    }
    
    public function __set($propriedade, $valor) {
        print "Tentou acessar {$propriedade} = $valor. Use setValor()<br>\n";
    }


    public function getValor(){
        return $this->valor;
    }
    
    public function setValor($valor) {
        $this->valor = $valor;
    }
}

$titulo = new Titulo();
print $titulo->valor;

$titulo->valor = 1234;

