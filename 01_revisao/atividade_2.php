<?php
$a = 3;
$b = 4;
$c = 6;

$delta= ($b ** 2 ) -(4 * $a *$c);
if ($delta <0){
    echo "Não existem raízes reais.";
}elseif ($delta == 0){
    $x =(-$b) /(2 * $a);
    echo "A única raiz é: " . $x;
}else {
    $x1 = (-$b +sqrt($delta))/(2 * $a);
    $x2 = (-$b - sqrt($delta))/(2 * $a);

    echo "Raízes 1: ". $x1 . "<br>";
    echo "Raízes 2: ". $x2    
}

>?
