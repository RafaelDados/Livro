<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './classes/CSVParser.php';
$csv = new CSVParser('clientes.csv',";");
$csv->parse();

while ($row = $csv->fetch()){
    print $row['Cliente']. " - ";
    print $row['Cidade']. "<br>\n";
}
