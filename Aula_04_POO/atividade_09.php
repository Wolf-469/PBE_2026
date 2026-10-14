<?php

class Produto{
    private $nome;
    private $preco;
    private $estoque;

    public function __construct ($nome,$preco,$estoque){
        $this->Nome = $nome;
        $this->Preco = $preco;
        $this->Estoque = $estoque;
    }

    public function vender($quantidade){
        if($quantidade <= $this-> Estoque){
            echo "Venda realizada com sucesso";
        }else{
            echo"Estoque insuficiente";
        }
    }

    public function ReajustarPreco($percentual){
        $this->Preco += $this->Preco * ($percentual /100);
    }

    public function exibirInfo(){
        echo "Nome: ". $this->Nome. "<br>";
        echo "Preco: R$ ". number_format ($this->Preco,2,' ,','.'). "<br>";
        echo "Estoque: ". $this->Estoque. "unidades";
    }
}

$produto = new Produto("Teclado Gamer", 250,10);
$produto->vender(2);
$produto->reajustarPreco(10);
$produto->exibirInfo();
?>