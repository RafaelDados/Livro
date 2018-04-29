<?php

class CSVParser {

    private $filename, $data, $header, $counter, $separator;

    public function __construct($filename, $separator = ',') {
        $this->filename = $filename;
        $this->separator = $separator;
        $this->counter = 1;
    }

    public function parse() {
        if (!file_exists($this->filename)) {
            throw new FileNotFoundExcpection("Arquivo {$this->filename} não encontrado.");
        }
        if (!is_readable($this->filename)) {
            throw new FilePermissionExcpection("Arquivo {$this->filename} sem permissão");
        }
        $this->data = file($this->filename);
        $this->header = str_getcsv($this->data[0], $this->separator);
        echo "<pre>";
        var_dump($this->header);
        echo "</pre><br>";
        return TRUE;
    }

    public function fetch() {
        if (isset($this->data[$this->counter])) {
            $row = str_getcsv($this->data[$this->counter++], $this->separator);
            print_r($row);
            echo '<br>';
            echo '<br>';
            foreach ($row as $key => $value) {
                $row[$this->header[$key]] = $value;
            }
            return $row;
        }
    }

}
