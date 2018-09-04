<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerXML.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerXML('/log_delete.xml'));
    Transaction::log('Clonando um produto');

    $p1 = Produto::find(10);
    $p2 = clone $p1;
    $p2->descricao .= '(clonado)';
    $p2->store();

    Transaction::close();

}catch (PDOException $e){
    Transaction::rollback();
    print $e->getMessage();
}