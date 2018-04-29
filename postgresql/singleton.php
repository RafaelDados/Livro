<?php

require_once './classes/Preferencias.php';
 //Obtém uma instancia

$p1 = Preferencias::getInstance();
print 'A linguagem é: '.$p1->getData('language')."<br>";
$p1->setData('language','es');
print 'A linguagem é: '.$p1->getData('language')."<br>";

//Obtém a mesma instancia

$p2 = Preferencias::getInstance();
print 'A linguagem é: '.$p2->getData('language')."<br>";

$p1->save();

