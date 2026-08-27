<?php
require_once "funcao.php";

$resultado = calcularPedido ("Teclado", 100, 10, 5, 7);
echo "Nome: ".$resultado ["nomeProduto"]. "<br>";
echo "SubTotal: ". $resultado ['subTotal'] . "<br>";
echo "Desconto: ". $resultado ['valorDesconto'] . "<br>";
echo "Imposto: ". $resultado ['TotalFinal'] . "<br>";
echo "Total: ". $resultado ['valorFinal'] . "<br>";

$Totalcomfrete = calculofrete($resultado ['valorFinal']);
echo "total com Frete". $Totalcomfrete;
?>