<?php
$conn = pg_connect("host=localhost port=5432 dbname=livro user=postgres password=123");
pg_query($conn,"INSERT INTO famosos (codigo,nome) VALUES (1, 'Érico Veríssimo')");

pg_close($conn);