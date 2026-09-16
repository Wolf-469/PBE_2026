<?php
$nome_cliente = $_POST['nome_cliente'];
$nome_filme = $_POST['nome_filme'];
$quantidade = $_POST['quantidade'];
$tipo = $_POST['tipo'];
$preco = 50;
if($tipo == 'meia'){
    $preco = $preco/2;
}

if($quantidade > 10){
    $desconto = $preco * 10/100;
    $preco = $preco - $desconto;
}
$total = $preco - $quantidade;

require_once 'view_relatorio. php';
?>