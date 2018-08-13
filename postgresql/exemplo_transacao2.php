<?php
require_once 'classes/ar/ProdutoComTransacao.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Transaction.php';

try{
    Transaction::open('estoque');

    $p1 = new Produto();
    $p1->descricao = 'Chocolate ao Leite';
    $p1->estoque = 17;
    $p1->preco_custo = 10;
    $p1->preco_venda = 15;
    $p1->codigo_barras = '1324545211478';
    $p1->data_cadastro = date('Y-m-d');
    $p1->origem = 'N';
    $p1->save();

    Transaction::close();

}catch (PDOException $e){
    Transaction::rollback();
    return $e->getMessage();
}