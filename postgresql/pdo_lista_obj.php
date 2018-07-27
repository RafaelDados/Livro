<?php
try{
    $conn = new PDO("pgsql:host=localhost dbname=livro user=postgres password=123");
    $result = $conn->query("SELECT codigo, nome FROM famosos");
    if($result){
        while ($row = $result->fetch(PDO::FETCH_OBJ)){
            echo $row->codigo.' - '.$row->nome."<br>\n";
        }
    }
    $conn = null;
}catch (PDOException $e){
    print "Erro!".$e->getMessage(). "<br>";
}