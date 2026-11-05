<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
    <h1>Produto Cadastrado</h1>
    <p>Nome: <?= $produto -> getNome() ?></p>
    <p>Quantidade <?= $produto->getQuantidade() ?></p>
    <p>Preço <?= $produto->getPreco()?></p>
    <p>Total em estoque: <?=number_format($produto->calcularTotal(), 2, ",",".")?></p>
    <p>Valor do desconto: <?=number_format ($produto->calcularDesconto(), 2, ",",".")?></p>
    <p>Total com Desconto: <?=number_format $produto->calcularTotalComDesconto()?></p>
    <p>Situação do estoque: <?=$produto->verificarDesconto()?></p>

    <?php if($produto->calcularDesconto >10)?>
        <p>Parabéns! Você ganhou 10% de desconto!!!</p>
        <?php else: ?>
            <p>"Dica: comprando 10 unidades ou mais você ganha 10% de desconto."</p>
        <?php endif ?>

    <a href="view.php">Cadastrar outro</a>
</body>
</html>