<?php

abstract class Conta {

    protected $agencia;
    protected $conta;
    protected $saldo;

    function __construct($agencia, $conta, $saldo) {
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = $saldo;
    }
    
    abstract function retirar($quantia);

    public function getInfo() {
        return "Agência: {$this->agencia}, Conta:{$this->conta}";
    }

    public function depositar($quantia) {
        if ($quantia > 0) {
            $this->saldo += $quantia;
        }
    }
    
    public function getSaldo(){
        return $this->saldo;
    }

}
