<?php

class Titulo{
    public $codigo, $dt_vencimento, $valor, $juros, $multa;
    
    public function __call($metodo, $values) {
        print "Você executou o método {$metodo} com os parametros: ".implode(',', $values)."<br>\n";
        return call_user_func($metodo, get_object_vars($this));
    }
}


$titulo = new Titulo;
$titulo->codigo = 1;
$titulo->dt_vencimento = '2015-05-20';
$titulo->valor = 12345;
$titulo->juros = 0.1;
$titulo->multa = 2;

//$titulo->teste1(1,2,3);
//$titulo->teste2(4,5,6);

$titulo->print_r();
print 'A contagem é: '.$titulo->count();
