<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conn = pg_connect("host=localhost port=5432 dbname=livro user=postgres password=123");
        pg_query($conn,"INSERT INTO famosos VALUES(2,'Érico Veríssimo')");
        ?>
    </body>
</html>
