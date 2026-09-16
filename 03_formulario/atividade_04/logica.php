<?php
$nome_aluno  = $_POST['nome'];
$nota 1 = $_POST['nota 1 '];
$nota 2 = $_POST['nota 2'];
$nota 3 = $_POST['nota 3'];


$media = ($nota1 + $nota2 + $nota3) /3;

if($media > 10){
    $media = 10;
}

require_once "view_relatorio.php"
?>