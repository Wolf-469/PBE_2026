<?php

class Pessoa {

    private $nome;
    private $idade;
    private $cidade;
    private $telefone;

    public function __construct($nome, $idade, $cidade, $telefone) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cidade = $cidade;
        $this->telefone = $telefone;
    }

    public function definirEndereco($cidade) {
        $this->cidade = $cidade;
    }

    public function definirTelefone($numero) {
        $this->telefone = $numero;
    }

    public function aniversario() {
        $this->idade++;
    }

    public function exibirPerfil() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Idade: " . $this->idade . " anos<br>";
        echo "Cidade: " . $this->cidade . "<br>";
        echo "Telefone: " . $this->telefone . "<br>";
    }
}

$pessoa = new Pessoa("Ana", 18, "Campinas", "19999999999");

$pessoa->exibirPerfil();

$pessoa->definirEndereco("São Paulo");
$pessoa->definirTelefone("11988887777");
$pessoa->aniversario();

$pessoa->exibirPerfil();

?>