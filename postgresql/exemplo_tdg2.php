<?php

require_once 'classes/tdg/Produto.php';
require_once  'classes/tdg/ProdutoGateway.php';

try{
    $conn = new PDO("pgsql:host=localhost dbname=livro user=postgres password=123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    Produto::setConnection($conn);

    $produtos = Produto::all();
    foreach ($produtos as $produto){
        $produto->delete();
    }

    $p1 = new Produto();
    $p1->descricao = 'Vinho Brasileiro Tinto Merlot';
    $p1->estoque = 10;
    $p1->preco_custo = 12;
    $p1->preco_venda = 18;
    $p1->codigo_barras = '1324545212154';
    $p1->data_cadastro = date('Y-m-d');
    $p1->origem = 'N';
    $p1->save();

    $p2 = new Produto();
    $p2->descricao = 'Vinho Importado Tinto Merlot';
    $p2->estoque = 10;
    $p2->preco_custo = 12;
    $p2->preco_venda = 18;
    $p2->codigo_barras = '1324545212154';
    $p2->data_cadastro = date('Y-m-d');
    $p2->origem = 'N';
    $p2->save();

    $p3 = Produto::find(1);
    print 'Descrição: '.$p3->descricao."<br>\n";
    print 'Margem de lucro: '.$p3->getMargemLucro()."%<br>\n";
    $p3->registraCompra(14, 5);
    $p3->save();

}catch (PDOException $e){
    return $e->getMessage();
}