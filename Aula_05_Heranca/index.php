<?php
require_once "Turma.php";

// criando o professor
$professor = new Professor("Leonardo Evangelista", "leonardo@email.com", "Programação");

//criar Turma
$turma = new Turma("INFO", $professor);

// criar alunos
$aluno = new Aluno("Ana Souza", 'ana@gmail.com', "B456");
$aluno->adicionarNota(8);
$aluno->adicionarNota(7);
$aluno->adicionarNota(9);

$aluno2 = new Aluno("Carlos Silva", 'carlos@gmail.com', "A123");
$aluno2->adicionarNota(5);
$aluno2->adicionarNota(6);
$aluno2->adicionarNota(7);

$aluno3 = new Aluno("Júlia Torres", 'julia@gmail.com', "C789");
$aluno3->adicionarNota(9);
$aluno3->adicionarNota(8);
$aluno3->adicionarNota(10);

// adiciono os alunos a turma criada
$turma->adicionarAluno($aluno);
$turma->adicionarAluno($aluno2);
$turma->adicionarAluno($aluno3);

//Exibindo o resumo da turma
$turma->exibirDadosTurma();
// Exibindo lista de alunos
$turma->listaAlunos();

echo "<h4> Polimorfismo </h4>";
//Mostrando o polimorfismo funcionando
$pessoas = [$professor, $aluno, $aluno2];
foreach($pessoas as $pessoa){
    $pessoa->exibirDadosPessoa();
    echo "<hr>";
}

?>