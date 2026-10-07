<?php

class Conta{
    public $titular;
    public $numero;
    public $saldo;
    public $tipo;

    function depositar($valor){
        $this->saldo = $this->saldo + $valor;
        echo "O saldo aumentou para $this->saldo";  
   }
   function sacar($valor){
    $this->saldo = $this->saldo - $valor;
    echo "O saldo resultou em $this->saldo";
   }
   function consultarSaldo(){
    echo " O valor do saldo é de $this->saldo";
   }
}

$conta1 = new Conta();

$conta1->titular = "Maria";
$conta1->numero = "1234";
$conta1->saldo = "12200";
$conta1->tipo = "corrente";


$conta1->consultarSaldo();
$conta1->sacar(200);
$conta1->consultarSaldo();


echo "titular: $conta1->titular <br>";
echo "numero: $conta1->numero <br>";
echo "saldo: $conta1->saldo <br>";
echo "tipo: $conta1->tipo <br><br>";

$conta2 = new Conta();

$conta2->titular = "Joana";
$conta2->numero = "1234";
$conta2->saldo = "12200";
$conta2->tipo = "popança";


echo "titular: $conta1->titular <br>";
echo "numero: $conta1->numero <br>";
echo "saldo: $conta1->saldo <br>";
echo "tipo: $conta1->tipo <br>";

$conta2->consultarSaldo();
$conta2->depositar(200);
$conta2->consultarSaldo();


?>