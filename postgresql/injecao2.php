<?php
require_once 'classes/Record.php';

interface ExporterInterface{
    public function export($data);
}

class XMLExporter implements ExporterInterface{

    public function export($data){
        $data = array_flip($data);
        $xml = new SimpleXMLElement('<record/>');
        array_walk_recursive($data, array($xml, 'addChild'));
        return $xml->asXML();
    }
}

class JSONExport implements ExporterInterface{
    public function export($data){
        return json_encode($data);
    }
}

class Pessoa extends Record {
    const TABLENAME = "PESSOA";

    public function export(ExporterInterface $ei){
        return $ei->export($this->data);
    }
}

$p = new Pessoa;
$p->nome = 'Rafael Almeida';
$p->endereco = 'Rua das Flores';
$p->numero = '123';

print $p->export( new JSONExport());
print PHP_EOL;
print $p->export( new XMLExporter());