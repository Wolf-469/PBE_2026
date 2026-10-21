<?php

class Carro{
    private $modelo;
    private $velocidade;

    public function __construct($modelo, $velocidade = 0){
        $this->modelo = $modelo;
        $this->velocidade = $velocidade;
    }

    public function acelerar($km){
        $this->$velocidade = 10;
    }

    public function frear($km){
        $this -> $velocidade -= 10;
    }

    public function velocidade(){
        echo "O carro $this ->modelo O carro está atualmente com a velocidade de $this->velocidade";
    }
}

$carro = new Carro ('Civic' );
echo "<pre>";
print_r($carro);
echo "</pre>";
?>