<?php
 = $_POST['nome'];
$produtos = $_POST ['produto1'];
$preco = $_POST ['preco1'];
$quantidade = $_POST ['quantidade1'];
$produtos = $_POST ['produto2'];
$preco = $_POST ['preco2'];
$quantidade = $_POST ['quantidade2'];
$produto = $_POST ['produto3'];
$preco = $_POST ['preco3'];
$quantidade = $_POST ['quantidade3'];
 
$produtos =[
    [
        'nome' =>$produto1,
        'preco' =>$preco1,
        'quantidade' => $quantidade1,
        'subtotal' => $preco1 *$quantidade1
    ],

    ["" => $produto2, "preco" => $preco2, "quantidade2" => $quantidade2, "subtotal" => $subtotal],
    ["nome" => $produto3, "preco" => $preco3, "quantidade3" => $quantidade3, "subtotal" => $subtotal],
];

$total = 0;
foreach ($produtos as $produto){
    $total += $produto['subtotal'];
}
$desconto = 0;
if($total > 500){
    $desconto = 10;
}

$valorDesconto = $total * ($deconto/100);
$total = $total - $valorDesconto;

require_once 'view_relatorio.php';
?>
