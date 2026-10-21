<?php

class Turma {
    private $nome;
    private $professor;
    private $alunos;
    private $limite;

    public function __construct($nome, $professor, $limite = 32) {
        $this->nome = $nome;
        $this->professor = $professor;
        $this->alunos = 1;
        $this->limite = $limite;
    }

    public function adicionarAluno() {
        if ($this->alunos < $this->limite) {
            $this->alunos++;
        }
    }

    public function removerAluno() {
        if ($this->alunos > 0) {
            $this->alunos--;
        }
    }

    public function exibirTurma() {
        echo "Turma: " . $this->nome . "<br>";
        echo "Professor: " . $this->professor . "<br>";
        echo "Alunos: " . $this->alunos . " / " . $this->limite;
    }
}

$turma = new Turma("PHP OO", "Lavínia");

$turma->adicionarAluno();
$turma->removerAluno();

$turma->exibirTurma();

?>