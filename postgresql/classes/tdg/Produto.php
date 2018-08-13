<?php
/**
 * Created by PhpStorm.
 * User: ralfa
 * Date: 27/07/2018
 * Time: 14:21
 */

class Produto{
    private static $conn;
    private $data;

    public function __get($prop){
        return $this->data[$prop];
    }

    public function __set($prop, $value){
        $this->data[$prop] = $value;
    }

    public static function setConnection(PDO $conn){
        self::$conn = $conn;
        ProdutoGateway::setConnection($conn);
    }

    public static function find($id){
        $gw = new ProdutoGateway();
        return $gw->find($id, 'Produto');
    }

    public static function all($filter = ''){
        $gw = new ProdutoGateway();
        return $gw->all($filter, 'Produto');
    }

    public function delete(){
        $gw = new ProdutoGateway();
        $gw->delete($this->id);
    }

    public function save(){
        $gw = new ProdutoGateway();
        $gw->save((object)$this->data);
    }

    public function getMargemLucro(){
        return (($this->preco_venda-$this->preco_custo) / $this->preco_custo) * 100;
    }

    public function registraCompra($custo, $quantidade){
        $this->custo = $custo;
        $this->estoque += $quantidade;
    }
}