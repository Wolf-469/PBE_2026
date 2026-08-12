<?php
$idade_pessoa = 16;
$acompanhada = true;
if ($idade_pessoa >= 18){
    echo " Pode entrar sozinha!";

}
elseif ($idade_pessoa >= 14
&& $idade_pessoa <= 17
&& $acompanhada == true){
    echo "Entrada liberdade com sucesso!!";
}
else{
    echo "Menores de 14 não pode entrar,mesmo acompanhada!!"
}
?>