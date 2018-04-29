<?php

require_once './classes/CSVParser.php';

//definição das subclasses de erro
class FileNotFoundExcpetion extends Exception {
    
}

class FilePermissionExcpetion extends Exception {
    
}

$csv = new CSVParser("clientes.csv", ';');

try {
    $csv->parse();
    while ($row = $csv->fetch()) {
        print $row['Cliente'] . " - ";
        print $row['Telefone'] . " - ";
        print $row['Cidade'] . " - " ;
        print $row['Endereço'] . "<br>\n";
    }
} catch (FileNotFoundExcpetion $e) {
    print_r($e->getTrace());
    die("Arquivo não encontrado");
} catch (FilePermissionExcpetion $e) {
    print_r($e->getFile());
    echo $e->getFile() . ' : ' . $e->getLine() . ' # ' . $e->getMessage();
}