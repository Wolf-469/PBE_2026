<?php
$funcionario = $_POST ['funcionario'];
$salario_bruto = $_POST ['salario_bruto'] ?? 0;
$horas_extras = $_POST ['horas_extras'];
$beneficios = $_POST ['beneficios'];
$desconto = $_POST ['descontos'];

    $horas_extras = $salario_bruto/160 . "<br";
    $valor_horas_extras = $valor_horas * 1.5 . "<br>";
    $valor_total_horas_extras = $horas_extras * $valor_hora_extra;

    $salario_bruto_sem_desconto = $salario_bruto + $valor_total_horas_extras + $beneficios;

    if($salario_bruto_sem_desconto >= 5000){
        $imposto = $salario_bruto_sem_desconto * 10/100;
    }elseif($salario_bruto_sem_desconto >= 3000){
        $imposto = $salario_bruto_sem_desconto * 5/100;
    }else{
        $impostos = 0;
    }

    $salario_liquido = $salario_bruto_sem_desconto - $imposto - $desconto;

    if($salario_liquido > 4000){
        $remuneracao = "Bem remunerado";
    }else{
        $remuneracao = "Médio";
    }

    echo $funcionario . "<br>";
    echo "Salário Bruto: R$ $salario_bruto <br>";
    echo "Salário Bruto + Total de horas extras + Benefícios R$ $salario_bruto_sem_desconto <br>";
    echo "Descontos: R$ $desconto <br>";
    echo "Imposto Aplicado R$ $imposto <br>";
    echo "Salário Líquido R$ $salario_liquido <br>";
    echo "Status: $remuneracao <br>";
?>