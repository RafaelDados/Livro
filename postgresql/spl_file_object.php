<?php

$file = new SplFileObject('spl_file_object.php');

print 'Nome: '.$file->getFilename()."<br>";
print 'Extensão: '.$file->getExtension()."<br>";

$file2 = new SplFileObject("novo.txt","w");
$bytes = $file2->fwrite('Olá mundo PHP'.PHP_EOL);
print 'Bytes escritos '.$bytes.PHP_EOL;
