<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATIVIDADE 6</title>
</head>
<body>
    <h1>Compra Ingressos</h1>
    <p><b>Nome: </b> <?= $nome ?></p>
    <p><b>Nome do Filme: </b> <?= $filme ?></p>
    <p><b>Quantidade: </b> <?= $quantidade ?></p>
    <p><b>Tipo Ingresso: </b> <?= $tipo ?></p>
    <p><b>Valor total: </b> <?= $total ?></p>

    <?php if($quantidade >= 10): ?>
        <h2>Parabéns você ganhou um desconto de 10%</h2>
    <?php endif ?>
</body>
</html>