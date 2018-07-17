<?php
require_once 'classes/Record.php';

class JSONExporter{
    public function export($data){
        return json_encode($data);
    }
}

class Pessoa extends Record {
    const TABLENAME ='PESSOAS';
    public function toJSON(){
        $je = new JSONExporter();
        return$je->export($this->data);
    }
}

$p = new Pessoa;
$p->nome = 'Rafael Almeida';
$p->endereco = 'Rua das Flores';
$p->numero = '123';

print $p->toJSON();