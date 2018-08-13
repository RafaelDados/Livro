<?php

class LoggerTXT extends Logger {

    function write($message){
        date_default_timezone_get('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");

        //monta a string
        $text = "$time :: $message\n";

        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}