<?php

class Paciente {

    private $nome;
    private $idade;
    private $peso;
    private $altura;

    public function __construct($nome, $idade, $peso, $altura) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC() {
        return $this->peso / ($this->altura * $this->altura);
    }

    public function classificarIMC() {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "Baixo peso";
        } elseif ($imc < 25) {
            return "Normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    public function exibirFicha() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Idade: " . $this->idade . " anos<br>";
        echo "Peso: " . $this->peso . " kg<br>";
        echo "Altura: " . $this->altura . " m<br>";
        echo "IMC: " . number_format($this->calcularIMC(), 2, ',', '.') . "<br>";
        echo "Classificação: " . $this->classificarIMC() . "<br>";
    }
}


$paciente = new Paciente("Carlos", 25, 70, 1.75);

$paciente->exibirFicha();

?>