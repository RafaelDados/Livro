<?php

class Software {

    private $id;
    private $nome;
    private static $contador;
    //teste atributo
    public $teste = 1;
    public $teste1 = 5;

    function __construct($nome) {
        self::$contador++;

        $this->id = self::$contador;
        $this->nome = $nome;
        print "Software {$this->id} - {$this->nome} <br>";
    }

    public static function getContador() {
        return self::$contador;
    }

    public static function apresenta($nome) {
        echo "Olá senhor(a) {$nome} <br>\n";
    }

}

class SoftwareAvanced extends Software {

    private $id;
    private $nome;

    public function funcaoteste() {
        
    }

}

/* echo '<pre>';

  new Software('Dia');
  new Software('Gimp');
  new Software('Gnumeric');

  echo 'Quantidade criada = '.Software::getContador();

  //funções para inspecionar Objetos(classe)

  //Ver métodos do objeto

  print_r(get_class_methods('Software'));
  echo '<br><br>';

  //Ver propriedades publicas do objeto
  print_r(get_class_vars('Software'));
  echo '</pre>';
 */

$sistema1 = new Software('Sistema 1');
$sys1 = new SoftwareAvanced('Sys1');

echo get_class($sistema1) . ' ';
echo get_class($sys1);
echo '<br>';

echo get_parent_class($sys1) . ' ';
echo get_parent_class('SoftwareAvanced') . ' ';
echo '<br>';

if (is_subclass_of($sys1, 'Software')) {
    echo 'Classe do objeto sys1 é derivada de Software <br>';
}

if (is_subclass_of('SoftwareAvanced', 'Software')) {
    echo 'Classe SoftwareAvanved é derivada de Software';
}

echo "<br><br>";

function apresenta($nome) {
    echo "Olá senhor(a) {$nome} <br>\n";
}

//execução de função por chamada com envio de parametros
$nomes = array('Rafael', 'Almeida');
foreach ($nomes as $values) {
    call_user_func('apresenta', $values);
}

//chamada de método estático
call_user_func(array('Software','apresenta'),'Rafael');

//chamada de método de objeto

$s1 = new Software("Sistema");
call_user_func(array($s1,'apresenta'),'Rafael');



