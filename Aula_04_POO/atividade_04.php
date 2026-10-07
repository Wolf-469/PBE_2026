<?php

class Pedido{
    public $numero;
    public $cliente;
    public $valor;
    public $status;

    function adicionarItens($valor){
        if($this->status == "Aguardando"){
            $this->valor = $this->valor=$valor;
        }else{
            echo "Não é possível adicionar itens. O pedido está $this->status <br>";
        }
    }

    function cancelar(){
        $this->status = "Calcelado";
        echo "Status alterado para $this->status <br>";
    }
    function finalizar(){
        $this->status = "Finalizado";
        echo "Status alterado para $this->status <br>";
    }
    function exibirResumo(){
        echo "Número $this->numero <br>";
        echo "Cliente $this->cliente <br>";
        echo "Valor R$ $this->valor <br>";
        echo "Status R$ $this->status <br>";
    }
}

$pedido1 = new Pedido()

$pedido1->numero = 1234;
$pedido1->cliente = "José";
$pedido1->valor = 123;
$pedido1->status = "Aguardando";

$pedido1->exibirResumo();
$pedido1->adicionarItens(80);
$pedido1->adicionarItens(20);
$pedido1->exibirResumo();
$pedido1->finalizar();
$pedido1->exibirResumo();
$pedido1->adicionarItens(20);

echo "<hr>";


$pedido2 = new Pedido()

$pedido2->numero = 1234;
$pedido2->cliente = "José";
$pedido2->valor = 123;
$pedido2->status = "Aguardando";

$pedido2->exibirResumo();
$pedido2->adicionarItens(30);
$pedido2->adicionarItens(20);
$pedido2->exibirResumo();
$pedido2->finalizar();
$pedido2->exibirResumo();
$pedido2->adicionarItens(20);


?>