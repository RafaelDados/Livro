<?php

require_once './classes/Conta.php';
require_once './classes/ContaPoupanca.php';
require_once './classes/ContaCorrente.php';
require_once './classes/ContaPoupancaUniversitaria.php';

/*
 * não foi possivel instanciar pois essa classe trata-se de uma classe abstrata, entao não pode ser instanciada
$contaConta = new Conta;
*/
/*
 * não pode ser criada pois a classe poupanca é uma classe final
$contaPUniversitaria = new ContaPoupancaUniversitaria(123, "cddfdf", 100);
 * 
 */
//criação de objetos
$contas = array();

$contas[] = new ContaPoupanca(6678, "PP.1234.57", 100);
$contas[] = new ContaCorrente(6677, "CC.1234.56", 100, 500);

foreach ($contas as $key => $conta) {
    print "<pre>";
    print "Conta: {$conta->getInfo()} <br>";
    print "Saldo atual {$conta->getSaldo()} <br>";
    $conta->depositar(200);
    print "Depósito de: 200 <br>";
    print "Saldo atual {$conta->getSaldo()} <br>";

    if ($conta->retirar(700)) {
        print "Retirada de: 700<br>";
    } else {
        print "Retirada de: 700 (não permitida)<br>";
    }
    print "Saldo atual {$conta->getSaldo()} <br>";
    print "</pre>";
}

