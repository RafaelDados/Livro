<?php

abstract class Record{
    protected $data;

    public function __construct($id = NULL){
        if($id){
            $object = $this->load($id);
            if($object){
                $this->fromArray($object->toArray());
            }
        }
    }

    public function __clone(){
        unset($this->data['id']);
    }

    public function __set($name, $value){
        if(method_exists($this,'set_'.$name)){
            call_user_func(array($this, 'set_'.$name), $value);
        }else{
            if($value == NULL){
                unset($this->data[$name]);
            }else{
                $this->data[$name] = $value;
            }
        }
    }

    public function __get($name){
        if(method_exists($this, 'get_'.$name)){
            call_user_func(array($this,'get_'.$name));
        }else{
            if(isset($this->data[$name])){
                return $this->data[$name];
            }
        }
    }

    public function __isset($name){
        return isset($this->data[$name]);
    }

    private function getEntity(){
        $class = get_class($this); //obtem o nome da classe
        return constant("{$class}::TABLENAME"); //retorna a constante de classse TABLENAME
    }

    public function fromArray($data){
        $this->data = $data;
    }

    public function toArray(){
        return $this->data;
    }

    public function store(){
        $prepared = $this->prepare($this->data);

        //verifica se tem id ou se existe na base de dados
        if((empty($this->data['id']))or (!$this->load($this->id))) {
            //incrementa o ID
            if (empty($this->data['id'])) {
            $this->id = $this->getLast()+1;
            $prepared['id'] = $this->id;
            }

            $sql = "INSERT INTO {$this->getEntity()} ".
                '('.implode(',',array_keys($prepared)) .')'.
                ' VALUES '.
                '('.implode(',',array_values($prepared)). ')';
        }else{
            $sql = "UPDATE {$this->getEntity()}";
            //monta os pared: coluna = valor
            if($prepared){
                foreach ($prepared as $column => $value){
                    if($column !== 'id'){
                        $set[] = "{$column} = {$value}";
                    }
                }
            }
            $sql .= ' SET '.implode(', ',$set);
            $sql .= ' WHERE id='. (int) $this->data['id'];
        }

        if($conn = Transaction::get()){
            Transaction::log($sql);
            $result = $conn->exec($sql);
            return $result;
        }else{
            throw new Exception('Não há transação ativa!!');
        }
    }

    public function load($id){
        $sql = "SELECT * FROM {$this->getEntity()}";
        $sql .= " WHERE id=".(int) $id;

        if($conn = Transaction::get()){
            Transaction::log($sql);
            $result = $conn->query($sql);

            if($result){
                $object = $result->fetchObject(get_class($this));
            }
            return $object;
        }else{
            throw new Exception('Não há transação ativa!!');
        }
    }

    public function delete($id = NULL){
        $id = $id ? $id : $this->id;

        $sql = "DELETE FROM {$this->getEntity()}";
        $sql .= " WHERE id=".(int) $this->data['id'];

        if($conn = Transaction::get()){
            Transaction::log($sql);
            $result = $conn->exec($sql);
            return $result;
        }else{
            throw new Exception('Não há transação ativa!!');
        }
    }

    public static function find($id){
        $classname = get_called_class();
        $ar = new $classname;
        return $ar->load($id);
    }

    private function getLast(){
        if($conn = Transaction::get()){
            $sql = "SELECT max(id) FROM {$this->getEntity()}";

            Transaction::log($sql);
            $result = $conn->query($sql);

            $row = $result->fetch();
            return $row[0];
        }else{
            throw new Exception('Não há transação ativa!!');
        }
    }

    public function prepare($data){
        $prepared = array();
        foreach ($data as $key => $value){
            if(is_scalar($value)){
                $prepared[$key] = $this->escape($value);
            }
        }
        return $prepared;
    }

    public function escape($value){
        if(is_string($value) and (!empty($value))){
            $value = addslashes($value);
            return "'$value'";
        }else if(is_bool($value)){
            return $value ? 'TRUE' : 'FALSE';
        }else if($value !== ''){
            return $value;
        }else{
            return "NULL";
        }
    }
}