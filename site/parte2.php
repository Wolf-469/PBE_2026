<?php
session_start();

if (!isset($_SESSION["compra"])) {
    header("Location: index.php");
    exit;
}

$compra = $_SESSION["compra"];

$filmes = [
    "coracao_selvagem" => "Coração Selvagem",
    "homem_aranha"     => "Homem-Aranha: Um Novo Dia",
    "vingadores"       => "Vingadores: Ultimato"
];

$nomeFilme = $filmes[$compra["filme"]] ?? "Filme selecionado";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePop | Compra concluída</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f7;
            color: #222;
            min-height: 100vh;
        }

        header {
            height: 90px;
            background: white;
            display: flex;
            align-items: center;
            padding: 8px 7%;
            border-bottom: 1px solid #e5e5e5;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }

        .logo {
            width: 165px;
            height: 75px;
            object-fit: contain;
            display: block;
            transition: 0.3s;
        }

        .logo:hover {
            transform: scale(1.04);
        }

        .container {
            width: min(650px, 92%);
            margin: 60px auto;
        }

        .card {
            background: white;
            padding: 45px 40px;
            border-radius: 22px;
            text-align: center;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.10);
        }

        .check {
            width: 82px;
            height: 82px;
            margin: 0 auto 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #198754;
            color: white;
            border-radius: 50%;
            font-size: 44px;
            font-weight: bold;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        h1 span {
            color: #b3132b;
        }

        .mensagem {
            color: #666;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .detalhes {
            background: #f7f7f8;
            padding: 20px;
            border-radius: 14px;
            text-align: left;
            margin-bottom: 28px;
        }

        .linha {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 13px 0;
            border-bottom: 1px solid #ddd;
        }

        .linha:last-child {
            border-bottom: none;
        }

        .linha span {
            color: #666;
        }

        .linha strong {
            text-align: right;
        }

        .total {
            color: #b3132b;
            font-size: 21px;
        }

        .botao {
            display: block;
            width: 100%;
            padding: 15px;
            background: #b3132b;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 11px;
            font-weight: bold;
            transition: 0.25s;
        }

        .botao:hover {
            background: #8f0e21;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {
            header {
                justify-content: center;
            }

            .logo {
                width: 145px;
            }

            .container {
                margin: 30px auto;
            }

            .card {
                padding: 30px 20px;
            }

            h1 {
                font-size: 26px;
            }

            .linha {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            .linha strong {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <header>
        <a href="index.php">
            <img src="logo.png" class="logo" alt="CinePop - Cinema e Diversão">
        </a>
    </header>

    <main class="container">
        <section class="card">
            <div class="check">✓</div>

            <h1>Pagamento <span>concluído!</span></h1>

            <p class="mensagem">
                Obrigado pela compra,
                <strong><?= htmlspecialchars($compra["nome"] ?? "cliente") ?></strong>!
                <br>
                Seu ingresso foi registrado com sucesso. 🍿
            </p>

            <div class="detalhes">
                <div class="linha">
                    <span>Filme</span>
                    <strong><?= htmlspecialchars($nomeFilme) ?></strong>
                </div>

                <div class="linha">
                    <span>Quantidade</span>
                    <strong><?= htmlspecialchars($compra["quantidade"] ?? 0) ?> ingresso(s)</strong>
                </div>

                <div class="linha">
                    <span>Tipo</span>
                    <strong>
                        <?= ($compra["tipo"] ?? "") === "meia" ? "Meia-entrada" : "Inteira"; ?>
                    </strong>
                </div>

                <div class="linha">
                    <span>Valor por ingresso</span>
                    <strong>R$ <?= number_format($compra["preco"] ?? 0, 2, ",", ".") ?></strong>
                </div>

                <div class="linha">
                    <span>Total</span>
                    <strong class="total">R$ <?= number_format($compra["total"] ?? 0, 2, ",", ".") ?></strong>
                </div>
            </div>

            <a href="index.php" class="botao">Voltar para o CinePop</a>
        </section>
    </main>

</body>

</html>