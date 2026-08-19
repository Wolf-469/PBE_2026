<?php
$desconto = 10;
$preco = 50;
$quantidade = 3;

function calcularPrecoFinal($preco, $quantidade, $desconto){
    $total = $preco * $quatidade;
    $totalDesconto = $total - ($total * $desconto/100);
    return "$totalDesconto";
}

$resultado = calcularPrecoFinal($preco , $quantidade, $desconto);
echo "preço: $preco <br>";
echo " desconto: $desconto <br>";
echo "quantidade: $quantidade <br>";
echo "resultado: $resultado ";

?>