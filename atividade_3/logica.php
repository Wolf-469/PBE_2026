<?php
$numero = $_POST['numero 1'];
$numero = $_POST['numero 2'];
$operação = $_POST['operacao'];

echo $numero . "<br>";
echo $numero2 . "<br>";
echo $operacao . "<br>";

if($operacao == "som"){
    echo $numero1 + $numero2;
}elseif($operacao == "sub"){
    echo $numero1 - $numero2;
}elseif($operacao == "mult"){
    echo$numero1 * $numero2;
}elseif($operacao == "div"){
    if($numero2 == 0){
        echo "Número não pode ser dividido por 0;"
    }else{
        echo $numero1/$numero2;
    }else{
        echo "Selecione uma operacao";
    }

}



?>