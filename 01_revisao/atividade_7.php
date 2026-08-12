<?php
$media =[
    "Ana"=>  8.5,
    "Bruno"=>  7.0,
    "Carlos"=> 9.2,
    "Diana"=> 6.8,
    "Eduardo"=> 8.0
];

$somaNotas = 0;
$totalAlunos = count($notasAlunos);

foreach ($notasAlunos as $nome => $notas){

    $notaFormatada = number_Format($nota, 1, '-' '');
    echo "O aluno $nome tirou nota $notaFormatada.<br>"

    $notaNotas += $nota;


}
 $mediaTurma = $somaNotas / $totalAlunos;
 $mediaFormatada = number_Format($mediaTurma, 2, '.', '');

 echo "<br> Ao final exiba a média da turma media $mediaFormatada.";
 ?>