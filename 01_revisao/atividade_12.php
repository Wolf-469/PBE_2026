<?php
idades = [16,17,18,40,14];
$media = 0;
$soma = 0;

foreach ($idades as idade){
    $soma = $soma + $idade

    if($idade > 18){
        $maior = $maior +1;
    
       

    }
}
 $media = $soma/count($idades);

 echo "A média é =". $media;

 echo "A maior idade é =". $maior
?>