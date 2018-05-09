<?php
$igredientes = new SplStack();

//acrescentando na pilha
$igredientes->push('Peixe');
$igredientes->push('Sal');
$igredientes->push('Limão');

foreach ($igredientes as $item){
    echo "Item: {$item}<br>";
}

echo "<br>";
//retirando da pilha
print $igredientes->pop()."<br>";
print "Count: ".$igredientes->count()."<br>";

print $igredientes->pop()."<br>";
print "Count: ".$igredientes->count()."<br>";

print $igredientes->pop()."<br>";
print "Count: ".$igredientes->count()."<br>";
