<?php


//interpreta o arquivo xml
$xml = simplexml_load_file('paises.xml');

//exibe as informações do objeto criado

echo "Nome: ".$xml->nome."<br>\n";
echo "Idioma: ".$xml->idioma."<br>\n";

echo "*** Informações geograficas ***<br>\n";
echo "Clima: ".$xml->geografia->clima."<br>\n";
echo "Costa: ".$xml->geografia->costa."<br>\n";
echo "Pico: ".$xml->geografia->pico."<br>\n";

