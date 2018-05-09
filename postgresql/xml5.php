<?php

//interpreta o arquivo xml
$xml = simplexml_load_file('paises.xml');

//alteração das propriedades
$xml->moeda = ' Novo Real (NR$) ';
$xml->geografia->clima = " Temperado ";

//adiciona novo nodo
$xml->addChild('presidente',' Kin Katagame ');

//exibindo novo doc XML
echo $xml->asXML();

//gravando novo arquivo
file_put_contents('paises.xml', $xml->asXML());

