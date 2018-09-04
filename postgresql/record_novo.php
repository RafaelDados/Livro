<?php

require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('/log_novo.txt'));
    Transaction::log('Inserindo produto novo');

    $p1 = new Produto();
    $p1->descricao = 'Suco de laranja integral';
    $p1->estoque = 52;
    $p1->preco_custo = 15;
    $p1->preco_venda = 22;
    $p1->codigo_barras = '1324545225474';
    $p1->data_cadastro = date('Y-m-d');
    $p1->origem = 'I';
    $p1->store();

    Transaction::close();
}catch (PDOException $e){
    Transaction::rollback();
    print $e->getMessage();
}