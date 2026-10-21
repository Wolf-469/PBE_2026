<?php
require_once "Aluno.php";
require_once "Professor.php";

class Turma{
    private $codigo;
    private $professor;
    private $alunos = [];

    public function __construct($codigo, Professor $professor){
       $this->codigo = $codigo;
       $this->professor = $professor; 
    }

    // recebe um objeto completo do aluno para ser adicionado
    // a lista de alunos
    public function adicionarAluno(Aluno $aluno){
        $this->alunos[] = $aluno;
    }

    // exibire a lista de alunos
    public function listaAlunos(){
        echo "<h3> Alunos da Turma $this->codigo </h3>";
        foreach ($this->alunos as $aluno){
            $aluno->exibirDadosAluno();
        }
    }

    public function exibirDadosTurma(){
        echo "<h2> Turma:$this->codigo</h2>";
        echo "Professor:".$this->professor->getNome() . "<br>";
        echo "Disciplina:" .$this->professor->getDisciplina() . "<br><hr>";
    }
}
?>