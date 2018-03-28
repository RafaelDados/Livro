<?php

//require_once './classes/Fabricante.php';
require_once './classes/Produto.php';
require_once './classes/Caracteristica.php';

//criação de  objetos
$p1 = new Produto('Chocolate', 10, 7);
//$f1 = new Fabricante('Chocolate Factory', 'Umuarama Zona III', '123456789');

//associação
//$p1->setFabricante($f1);

/*print 'A descricao do produto é '. $p1->getDescricao()."<br>";
print 'O fabricante do '.$p1->getDescricao().' é '.$p1->getFabricante()->getNome();*/

$p1->addCaracteristica('Cor', 'Preto');
$p1->addCaracteristica('Peso', '2.6 Kg');
$p1->addCaracteristica('Potência', '20 Watts RMS');

print 'Produto: '.$p1->getDescricao()."<br>\n";

foreach ($p1->getCaracteristica() as $c){
    print " Característica: ".$c->getNome().' - '.$c->getValor()."<br>\n";
}

