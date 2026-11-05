<?php
class Produto{
    private $nome;
    private $quantidade;
    private $preco;

    public function __construct($nome,$quantidade,$preco){
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function getPreco(){
        return $this->preco;
    }
    
    public function calcularTotal(){
        return $this->preco * $this->quantidade;
    }


    public function calcularDesconto(){
      if($this->quantidade >=10){
        return $this->calcularTotal * 0.10;
      }else{
        return 0;
      }

      public function calcularTotalComDesconto(){
        return $this->calcularTotal() - this->calcularDesconto();
      }

      public function verificarDesconto(){
        if ($this->quantidade < 5) {
            return "Estoque baixo";
        } else {
            return "Estoque normal";
        }
      }
}
    

?>