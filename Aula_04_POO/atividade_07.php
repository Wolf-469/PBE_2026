<?php

class ContaBancaria{
    public $titular;
    public $saldo;

    function __construct($titular, $saldo){
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    function depositar($valor){
        $this->saldo = $this->saldo + $valor; 
   }
   function sacar($valor){
    $this->saldo = $this->saldo - $valor;
   }
   public function exibirSaldo(){
    echo "Titular: $this->titular Saldo: $this->saldo <br>";
   }
}

$conta1 = new ContaBancaria("Brenda", 0);
$conta1->depositar(300);
$conta1->sacar(150);
$conta1->exibirSaldo();

?>