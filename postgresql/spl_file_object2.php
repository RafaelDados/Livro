<?php

$file = new SplFileObject('spl_file_object2.php');

print 'Forma 1:<br>';
while(!$file->eof()){
    print 'linha: '.$file->fgets();
}
print PHP_EOL.PHP_EOL;
print 'Forma 2:<br>';
foreach ($file as $linha => $conteudo){
    print "$linha: $conteudo";
}
