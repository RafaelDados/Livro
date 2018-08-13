<?php

class LoggerXML extends Logger {

    function write($message){
        date_default_timezone_get('America/Sao_Paulo');
        $time = date('Y-m-d H:i:s');

        $text = "<log>\n";
        $text .= "<time>$time</time>\n";
        $text .= "<message>$message</message>\n";
        $text .= "</log>\n";

        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}