<?php

//interpreta o arquivo xml
$xml = simplexml_load_file('paises3.xml');
//var_dump($xml);
echo "Nome: ".$xml->nome."<br>\n";
echo "Idioma: ".$xml->idioma."<br>\n";
echo "<br>\n";

echo '*** Estados ***'."<br>\n";

foreach ($xml->estados->nome as $estado){
    echo 'Nome: '.$estado."<br>";
}




