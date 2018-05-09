<?php

$igredientes = new SplQueue();

//acrescentando fila
$igredientes->enqueue('Peixe');
$igredientes->enqueue('Sal');
$igredientes->enqueue('Limão');

foreach ($igredientes as $item){
    echo "Item: {$item}<br>".PHP_EOL;
}

print "<br>";

//removendo da fila
print $igredientes->dequeue()."<br>";
print "Count: ".$igredientes->count()."<br>";

print $igredientes->dequeue()."<br>";
print "Count: ".$igredientes->count()."<br>";

print $igredientes->dequeue()."<br>";
print "Count: ".$igredientes->count()."<br>";

