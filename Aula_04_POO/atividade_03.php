<?php

class Aula{
    public $disciplina;
    public $professor;
    public $duracao;
    public $n_sala;
    public $bloco;

    function exibirInformacoes(){
        echo "Disciplina: $this->$disciplina <br>";
        echo "Professor: $this->$professor <br>";
        echo "Duração: $this->$duracao <br>";
        echo "Número da sala: $this->$n_sala <br>";
        echo "Bloco: $this->$bloco <br>";
    }
    function trocarProfessor($nome_professor){
        $this->professor = $nome_professor;
        echo "O novo professor é $this->$professor <br>";

    }
    function alterarLocal($novo_bloco, $novo_numero_sala){
        $this->n_sala = $novo_numero_sala;
        $this->bloco =  $novo_bloco;

        echo " O novo local é $this->bloco $this->n_sala <br>";
    }

}

$aula1 = new Aula();

$aula1->disciplina = "Matemática";
$aula1->professor = "Ana Paula";
$aula1->duracao = "40min";
$aula1->n_sala = 11;
$aula1->bloco = 1;

$aula1->exibirInformacoes();
echo "<hr>";
$alua1->trocarProfessor("Gabriel");
echo "<hr>";
$aula1->alterarLocal("B",10);
echo "<hr>";
$aula1->exibir_informacoes();

$aula2 = new Aula();

$aula2->disciplina = "Geografia";
$aula2->professor = "Plínio";
$aula2->duracao = "40min";
$aula2->n_sala = 11;
$aula2->bloco = 1;

$aula2->exibirInformacoes();
echo "<hr>";
$alua2->trocarProfessor("Michele");
echo "<hr>";
$aula2->alterarLocal(1,10);
echo "<hr>";
$aula2->exibir_informacoes();


?>