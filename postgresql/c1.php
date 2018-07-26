<?php
namespace Library\Widgets;

use Library\Conteiner\Table;
use SplFileInfo;

class Form {
    public function fazAlgo(Field $f){}

    public function show(){
        new Table();
        new SplFileInfo('/tmp/shadow');
    }
}