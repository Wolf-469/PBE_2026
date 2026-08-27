<?php
function calcularPedido ($nome, $preco, $quantidade, $desconto = 0, $imposto = 0){
        $subtotal = $preco * $quantidade;
        $valorDesconto = $subtotal * ($desconto/100);
        $valorTotalComDesconto = $subtotal - $valorDesconto;
        $valorImposto = $valorTotalComDesconto * ($imposto/100);
        $totalFinal = $valorTotalComDesconto + $valorImposto;

        return[
            "nomeProduto" => $nome,
            "subTotal" => $subtotal,
            "valorDesconto" => $valorDesconto,
            "valorImposto" => $valorImposto,
            "valorFinal" => $totalFinal
        ];
}

function calcularfrete (){
    $frete = $valorTotal + (10/100);
    $totalcomfrete = $totalFinal + $frete;

    return $totalcomfrete;
}


?>