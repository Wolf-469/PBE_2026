<?php
class Celular{
    public $marca;
    public $modelo;
    public $cor;
    public $bateria;
    public $ligado;

    function ligar(){
        $this->ligado = true;
        echo "O celular foi ligado";
    }

    function desligar(){
        $this->ligado = false;
        echo"O celular foi desligado <br>";
    }

    function usar(){
        $this->bateria = this->bateria - $consumo;
        if($this->bateria < 0){
            $this->bateria = 0;
        }

        echo "A bateria foi consumida em $consumo <br>";
        echo "Sobrando total de $this->bateria";

    }

    function carregar($carga){
        $this->bateria = $this->bateria + $carga;
        if($this-> bateria > 100){
            $this->bateria = 100;
        }
        echo"A bateria foi CARREGADA em $carga";
        echo"Aumentando a bateria para $this -> bateria";
    }
}

$celular1 = new Celular();

$celular1->marca = "Samsung";
$celular1->modelo = "S26";
$celular1->cor = "Rosa";
$celular1->bateria = "85";
$celular1->ligado = true;

echo "marca: $celular1->marca <br>";
echo "modelo: $celular1->modelo <br>";
echo "cor: $celular1->cor <br>";
echo "bateria: $celular1->bateria <br>";
echo "ligado: $celular1->ligado <br>";

$celular1->carregar(33);
$celular1->carregar(12);
$celular1->usar(25);
$celular1->desligar();


$celular2 = new Celular();

$celular2->marca = "Apple";
$celular2->modelo = "Iphone 18";
$Celular2->cor = "Bordô";
$celular2->bateria = "85";
$celular2->ligado = true;

echo "marca: $celular2->marca <br>";
echo "modelo: $celular2->modelo <br>";
echo "cor: $celular2->cor <br>";
echo "bateria: $celular2->bateria <br>";
echo "ligado: $celular2->ligado <br>";

$celular1->carregar(20);
$celular1->carregar(9);
$celular1->usar(30);
$celular1->desligar();
?> 