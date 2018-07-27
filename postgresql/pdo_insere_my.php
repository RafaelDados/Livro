<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=livro', 'root', '');
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (1, 'Ayrton Senna')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (2, 'Charlie Chalin')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (3, 'Anita Garibaldi')");
    $conn->exec("INSERT INTO famosos (codigo, nome) VALUES (4, 'Mário Quintana')");
    $conn = null;
} catch (PDOException $e) {
    print "Erro!".$e->getMessage(). "<br>";
}