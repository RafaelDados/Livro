<?php
/**
 * Created by PhpStorm.
 * User: ralfa
 * Date: 25/07/2018
 * Time: 15:59
 */

try{
    //instancia o objeto PDO , conectando no PostgreSQL
    //"pgsql:host=localhost dbname=nome_do_banco user=jvideos10 password=password"
    $conn = new PDO("pgsql:host=localhost dbname=livro user=postgres password=123");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chalin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");
    $conn = null;
}catch (PDOException $e){
    print "Erro!".$e->getMessage(). "\n";
}