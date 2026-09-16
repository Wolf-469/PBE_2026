<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 5</title>
</head>
<body>
    <h1> Resultado IMC<?= $nome ?></h1>
    <p><b>Nome: </b>  <?= $nome ?> </p>
    <p><b>  Peso:<?= $peso?></p>
    <p><b>  altura:<?= $altura?> </p>
    <p><b>  IMC:<?= $imc?> </p>
    
    <?php if($imc < 18.5): ?>
        <p>Abaixo do peso</p>
    <?php elseif($imc >= 18.5 && $imc <24.9): ?>
        <p>Peso Normal</p>
    <?php elseif($imc >= 25 && $imc <29.9) : ?>
        <p>Sobrepeso</p>
    <?php else: ?>
        <p>Obesidade</p>
    <?php endif ?>
</body>
</html>