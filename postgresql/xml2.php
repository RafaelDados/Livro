<?php

//interpreta o arquivo xml
$xml = simplexml_load_file('paises.xml');

//exibe as informações do objeto criado

echo 'Nome:'.$xml->nome."<br>\n";
echo 'Idioma:'.$xml->idioma."<br>\n";
echo 'Capital:'.$xml->capital."<br>\n";
echo 'Moeda:'.$xml->moeda."<br>\n";
echo 'Prefixo:'.$xml->prefixo."<br>\n";

