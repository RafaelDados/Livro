<?php

$file = new SplFileInfo('paises4.xml');
print 'Nome: '.$file->getFilename()."<br>";
print 'Extensão: '.$file->getExtension()."<br>";
print 'Tamanho: '.$file->getSize()."<br>";
print 'Caminho: '.$file->getRealPath()."<br>";
print 'Tipo: '.$file->getType()."<br>";
print 'Gravação: '.$file->isWritable()."<br>";
