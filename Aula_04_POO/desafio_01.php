<?php

class Pedido{
    private $cliente;
    private $valorItens;

    public function __construct($cliente,$valorItem = 0 ){
        $this->cliente = $cliente;
        $this->valorItem = $valorItem;
    }

    public function adicionarItem($valor){
        $this->valorItens += $valor;
    }

    public function getTotal(){
        return $this->valorItens;
    }

    public function exibirPedido(){
        echo "Cliente: ($this-> cliente )- Total dos Itens: R$ ($this-> valorItens)<br>";
    }
}

class NotaFiscal{
    private $totalPedido;
    private $imposto;
    private $totalPagar;

    public function __construct($totalPedido, $imposto = 10){
        $this->totalPedido = $totalPedido;
        $this->imposto = $imposto;
        $this->totalPagar = 0;
    }

    public function calcularTotal(){
        $this->totalPagar = $this->totalPedido + ($this->totalPedido * ($this->imposto/100));
    }

    public function exibirNota(){
        echo "Subtotal: R$ $this->totalPedido <br>";
        echo "Imposto:  $this->imposto %<br>";
        echo "Total Pagar: R$ $this->totalPagar <br>";
    }
}

$pedido = new Pedido("Brenda", 20);
$pedido->adicionarItem(50);
$pedido->adicionarItem(27);
echo $pedido->exibirPedido();

$notaFiscal = new NotaFiscal($pedido->getTotal(),8);
$notaFiscal->calcularTotal();
$notaFiscal->exibirNota();

?>