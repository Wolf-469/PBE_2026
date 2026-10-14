<?php

class Carro{
    private $modelo;
    private $consumo;
    private $tanque;

    public function __construct($modelo, $consumo = 10, $tanque_inicial = 0){
        $this->modelo = $modelo;
        $this->consumo = $consumo;
        $this->tanque = $tanque_inicial;
    }

    public function abastecer($litros){
        if($litros >0){
            $this->tanque += $litros:
            echo"Foram abastecidos $litros litros <br>";
        }else{
            echo"Quantidade de combustível inválida <br>";
        }
    }
    public function dirigir($km){
        if($km <= 0){
            echo "Distância inválida <br>";
            return;
        }
    }
        $necessario = $km / $this->consumo;
        if($necessario <= $this->tanque){
            $this->tanque -= $necessario;
            echo "O carro percorreu $km km <br>";
        }else{
            echo "Combustível insuficiente para percorrer $km km <br>";
        }
    
    public function exibir_info(){
        echo "Modelo: $this->modelo <br>";
        echo "consumo: $this->consumo <br>";
        echo "Combustível no tanque: $this->tanque litros <br>";
    }
}

$carro = new Carro("Honda Civic", 12, 20);
$carro->exibirInfo();
$carro->dirigir(60);
$carro->abastecer(10);
$carro->exibir_info();

?>