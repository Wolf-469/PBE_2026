<?php
require_once "Aluno.php";

$nome = $_POST['nome'] ?? '';
$turma = $_POST['turma'] ?? '';
$nota1 = (float) ($_POST['nota1'] ?? 0);
$nota2 = (float) ($_POST['nota2'] ?? 0);
$nota3 = (float) ($_POST['nota3'] ?? 0);
$faltas = (int) ($_POST['faltas'] ?? 0);

$aluno = new Aluno($nome, $turma, $nota1, $nota2, $nota3, $faltas);

require_once "view_relatorio.php";