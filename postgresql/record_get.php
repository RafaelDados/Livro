<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerXML.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerXML('/log_find.xml'));
    Transaction::log('Buscando um produto');
    $p1 = Produto::find(2);
    print $p1->descricao;
    echo '<br>';
    print $p1->codigo_barras;

}catch (PDOException $e){
    Transaction::rollback();
    print $e->getMessage();
}