<?php

//interpreta o arquivo xml
$xml = simplexml_load_file('paises.xml');

//exibe as informações do objeto criado

foreach ($xml->children() as $elemento => $valor) {
    echo "$elemento -> $valor<br>\n";
}

