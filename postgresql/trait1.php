<?php

require_once "classes/Record.php";
include_once "trait2.php";

class Pessoa extends Record{
    const TABLENAME = 'pessoas';
    use ConversaoTrait;
}

class Fornecedor extends Record{
    const TABLENAME = 'fornecedores';
}

class Produto extends Record{
    const TABLENAME = 'produtos';
}

$p= new Pessoa();
//$p->load(2);
//print '<br>'.PHP_EOL;

$p->nome = 'Rafael Almeida Silva';
$p->endereco = 'Rua imaculada conceição';
$p->numero = '4574';

print $p->toXML();

echo "<br>";

print $p->toJSON();
//$p->save();

