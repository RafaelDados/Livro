<?php
require_once 'classes/dm/Produto.php';
require_once 'classes/dm/VendaMapper.php';
require_once 'classes/dm/Venda.php';

try{
    $p1 = new Produto;
    $p1->id = 1;
    $p1->preco = 12;

    $p2 = new Produto;
    $p2->id = 2;
    $p2->preco = 14;

    $venda = new Venda();

    //adiciona alguns produtos
    $venda->addItem(10, $p1);
    $venda->addItem(20,$p2);

    $conn = new PDO("pgsql:host=localhost dbname=livro user=postgres password=123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    VendaMapper::setConnection($conn);

    //salva venda
    VendaMapper::save($venda);

}catch (PDOException $e){
    print $e->getMessage();
}