<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerXML.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerXML('/log/log_delete.xml'));
    Transaction::log('Deletando um produto');

    $p1 = Produto::find(10);

    if($p1 instanceof Produto){
        $p1->delete();
    }else{
        throw new Exception('Produto não localizado');
    }

    Transaction::close();

}catch (PDOException $e){
    Transaction::rollback();
    print $e->getMessage();
}