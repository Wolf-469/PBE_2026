<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
            <h1>Resumo da Compra </h1>
            <p><b>Cliente:<b> <?= $nome ?> </p>

        <table border="1">
            <theard>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade<th>
                    <th>Subtotal<th>
                </tr>
           </theard>
        <tbody>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produtos['nome']?></td>
                <td><?= $produtos['preco']?></td>
                <td><?= $produtos['quantidade']?></td>
                <td><?= $produtos['subtotal']?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <br>
    <p><b>Desconto</b> <?= $valorDesconto ?></p>
    <?php if($desconto > 0):?>
        <h2>Parabéns você ganhou desconto!!!</h2>

    </table>
</body>
</html>