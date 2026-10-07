<?php
if (!isset($informacoes)) {
    session_start();
    $informacoes = $_SESSION['compra'] ?? null;
}

if (!$informacoes) {
    header("Location: view.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePop | Resumo da Compra</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f7;
            color: #222;
        }
        header {
            background-color: #7a3939;
            padding: 15px;
            text-align: center;
            color: white;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        h2, h3 {
            color: #7a3939;
            margin-bottom: 15px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f7f7f8;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .options-group {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        .btn-confirmar {
            width: 100%;
            padding: 12px;
            background-color: #198754;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        .btn-confirmar:hover {
            background-color: #146c43;
        }
        .btn-voltar {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #b3132b;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <header>
        <h1>CinePop</h1>
    </header>

    <main class="container">
        <h2>Resumo da Compra</h2>

        <table>
            <tr>
                <th>Nome</th>
                <td><?= htmlspecialchars($informacoes['nome']) ?></td>
            </tr>
            <tr>
                <th>Filme</th>
                <td><?= htmlspecialchars($informacoes['filme']) ?></td>
            </tr>
            <tr>
                <th>Tipo</th>
                <td><?= htmlspecialchars($informacoes['tipo']) ?></td>
            </tr>
            <tr>
                <th>Quantidade</th>
                <td><?= htmlspecialchars($informacoes['quantidade']) ?></td>
            </tr>
            <tr>
                <th>Preço Individual</th>
                <td>R$ <?= number_format($informacoes['preco_unitario'], 2, ',', '.') ?></td>
            </tr>
            <tr>
                <th>Preço Total</th>
                <td><strong>R$ <?= number_format($informacoes['preco_total'], 2, ',', '.') ?></strong></td>
            </tr>
        </table>

        <h3>Essas informações estão corretas?</h3>
        <p style="text-align: center; margin-bottom: 20px;">Se sim, preencha os dados do pagamento:</p>

        <form action="processa2.php" method="POST">
            <div class="form-group">
                <label>Tipo de Cartão:</label>
                <div class="options-group">
                    <label><input type="radio" name="cartao" value="Mastercard" required> Mastercard</label>
                    <label><input type="radio" name="cartao" value="Banco do Brasil"> Banco do Brasil</label>
                    <label><input type="radio" name="cartao" value="Santander"> Santander</label>
                </div>
            </div>

            <div class="form-group">
                <label for="numero_cartao">Número do Cartão:</label>
                <input type="text" id="numero_cartao" name="numero_cartao" placeholder="0000 0000 0000 0000" required>
            </div>

            <button type="submit" class="btn-confirmar">Confirmar Pagamento</button>
        </form>

        <a href="view.php" class="btn-voltar">Se não, clique aqui para voltar à página anterior</a>
    </main>

</body>
</html>