<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerXML.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerXML('/log_update.xml'));
    Transaction::log('Alterando um produto');

    $p1 = Produto::find(10);

    print $p1->estoque.'<br>';

    $p1->estoque += 10;

    print $p1->estoque.'<br>';

    $p1->store();

    Transaction::close();

}catch (PDOException $e){
    Transaction::rollback();
    print $e->getMessage();
}