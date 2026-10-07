<?php
session_start();


$filmes = [
    "coracao_selvagem" => [
        "nome" => "Coração Selvagem",
        "preco" => 20.00,
        "imagem" => "coracao.png",
        "descricao" => "Uma história emocionante para aproveitar no ecrã gigante."
    ],
    "homem_aranha" => [
        "nome" => "Homem-Aranha",
        "preco" => 25.00,
        "imagem" => "aranha.jpg",
        "descricao" => "Ação, aventura e muita emoção do início ao fim."
    ],
    "vingadores" => [
        "nome" => "Vingadores",
        "preco" => 30.00,
        "imagem" => "vingadores.png",
        "descricao" => "Os maiores heróis reunidos numa grande batalha."
    ]
];

/* ==========================================
   2. CONTROLO DE PÁGINAS E ERROS
========================================== */

$pagina = $_GET["pagina"] ?? "inicio";
$erro = $_SESSION["erro"] ?? "";
unset($_SESSION["erro"]);

/* ==========================================
   3. PROCESSAMENTO DE FORMULÁRIOS (POST)
========================================== */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $acao = $_POST["acao"] ?? "";

    /* ---- SUBMISSÃO DA COMPRA ---- */
    if ($acao === "comprar") {

        $nome = trim($_POST["nome"] ?? "");
        $filme = $_POST["filme"] ?? "";
        $tipo = $_POST["tipo"] ?? "";
        $quantidade = (int)($_POST["quantidade"] ?? 0);

        if ($nome === "") {
            $_SESSION["erro"] = "Por favor, introduza o seu nome.";
            header("Location: ?pagina=comprar&filme=" . urlencode($filme));
            exit;
        } elseif (!isset($filmes[$filme])) {
            $_SESSION["erro"] = "Selecione um filme válido.";
            header("Location: ?pagina=comprar");
            exit;
        } elseif (!in_array($tipo, ["inteira", "meia"])) {
            $_SESSION["erro"] = "Selecione o tipo de bilhete.";
            header("Location: ?pagina=comprar&filme=" . urlencode($filme));
            exit;
        } elseif ($quantidade < 1 || $quantidade > 20) {
            $_SESSION["erro"] = "Selecione uma quantidade válida (entre 1 e 20).";
            header("Location: ?pagina=comprar&filme=" . urlencode($filme));
            exit;
        } else {

            $precoUnitario = $filmes[$filme]["preco"];
            if ($tipo === "meia") {
                $precoUnitario /= 2;
            }

            $total = $precoUnitario * $quantidade;

            $_SESSION["compra"] = [
                "nome" => $nome,
                "filme" => $filme,
                "tipo" => $tipo,
                "quantidade" => $quantidade,
                "preco" => $precoUnitario,
                "total" => $total
            ];

            header("Location: ?pagina=resumo");
            exit;
        }
    }

    /* ---- PROCESSAMENTO DO PAGAMENTO ---- */
    elseif ($acao === "pagamento") {

        if (!isset($_SESSION["compra"])) {
            header("Location: ?pagina=inicio");
            exit;
        }

        $cartao = $_POST["cartao"] ?? "";
        $numero = trim($_POST["numero"] ?? "");
        $cvv = trim($_POST["cvv"] ?? "");

        if ($cartao === "") {
            $_SESSION["erro"] = "Selecione a bandeira do cartão.";
            header("Location: ?pagina=resumo");
            exit;
        } elseif ($numero === "" || strlen(preg_replace('/\D/', '', $numero)) < 13) {
            $_SESSION["erro"] = "Introduza um número de cartão válido.";
            header("Location: ?pagina=resumo");
            exit;
        } elseif ($cvv === "" || strlen($cvv) < 3) {
            $_SESSION["erro"] = "Introduza um código CVV válido.";
            header("Location: ?pagina=resumo");
            exit;
        } else {
            $_SESSION["pagamento"] = true;
            header("Location: ?pagina=sucesso");
            exit;
        }
    }

    /* ---- CANCELAR OU REINICIAR ---- */
    elseif ($acao === "cancelar") {
        unset($_SESSION["compra"], $_SESSION["pagamento"]);
        header("Location: ?pagina=inicio");
        exit;
    }
}

/* ==========================================
   4. PROTEÇÃO DE ROTAS (GET)
========================================== */

$compra = $_SESSION["compra"] ?? null;

if ($pagina === "resumo" && !$compra) {
    header("Location: ?pagina=inicio");
    exit;
}

if ($pagina === "sucesso" && empty($_SESSION["pagamento"])) {
    header("Location: ?pagina=inicio");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePop - Cinema & Diversão</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: radial-gradient(circle at top, #2b1020, #090a0f 55%);
            color: white;
            min-height: 100vh;
        }

        /* =========================
           CABEÇALHO E LOGÓTIPO
        ========================= */
        header {
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            background: #0d0f16;
            border-bottom: 1px solid #292d38;
        }

        .logo-link {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        .logo-badge {
            background: #ffffff;
            padding: 6px 14px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .logo-badge:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(255, 49, 80, 0.3);
        }

        .logo-img {
            height: 52px;
            width: auto;
            display: block;
            object-fit: contain;
        }

        .logo-texto {
            font-size: 28px;
            font-weight: bold;
            color: #ff3150;
        }

        .logo-texto span {
            color: #ffffff;
        }

        .menu a {
            color: #ddd;
            text-decoration: none;
            margin-left: 25px;
            font-size: 15px;
            font-weight: bold;
            transition: color 0.2s;
        }

        .menu a:hover {
            color: #ff3150;
        }

        /* =========================
           ESTRUTURA PRINCIPAL
        ========================= */
        .container {
            width: min(1100px, 90%);
            margin: auto;
            padding: 50px 0;
        }

        .titulo {
            text-align: center;
            margin-bottom: 45px;
        }

        .titulo h1 {
            font-size: clamp(35px, 6vw, 60px);
            margin-bottom: 15px;
        }

        .titulo h1 span {
            color: #ff3150;
        }

        .titulo p {
            color: #aeb2bf;
            font-size: 18px;
        }

        /* =========================
           GRELHA DE FILMES
        ========================= */
        .filmes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
        }

        .filme {
            background: #12151e;
            border: 1px solid #292d38;
            border-radius: 18px;
            overflow: hidden;
            transition: 0.3s;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
        }

        .filme:hover {
            transform: translateY(-8px);
            border-color: #ff3150;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.7);
        }

        .filme img {
            width: 100%;
            height: 360px;
            object-fit: cover;
            display: block;
        }

        .filme-conteudo {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: space-between;
        }

        .filme h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .filme p {
            color: #9ea4b4;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .preco {
            color: #ffd15c;
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* =========================
           BOTÕES E FORMULÁRIOS
        ========================= */
        .botao {
            display: inline-block;
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #ff3150;
            color: white;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.2s;
        }

        .botao:hover {
            background: #e62443;
            transform: scale(1.01);
        }

        .botao-secundario {
            background: #272b37;
            margin-top: 10px;
        }

        .botao-secundario:hover {
            background: #343947;
        }

        .caixa {
            width: min(650px, 100%);
            margin: auto;
            background: #12151e;
            border: 1px solid #292d38;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        }

        .caixa h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .subtitulo {
            color: #9da3b2;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #363b49;
            background: #0b0d13;
            color: white;
            font-size: 16px;
            outline: none;
        }

        input:focus {
            border-color: #ff3150;
        }

        .opcoes {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .opcoes input {
            display: none;
        }

        .opcao {
            display: block;
            padding: 13px 17px;
            border-radius: 10px;
            border: 1px solid #363b49;
            background: #0b0d13;
            color: #c7cbd5;
            cursor: pointer;
            transition: 0.2s;
        }

        .opcoes input:checked + .opcao {
            background: #ff3150;
            border-color: #ff3150;
            color: white;
        }

        .erro {
            background: #4b1720;
            border: 1px solid #ff3150;
            color: #ff9cac;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .resumo {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 25px 0;
        }

        .informacao {
            background: #0b0d13;
            padding: 17px;
            border-radius: 12px;
        }

        .informacao small {
            display: block;
            color: #858b9b;
            margin-bottom: 7px;
        }

        .total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px;
            background: #27121b;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        .total strong {
            font-size: 28px;
            color: #ffd15c;
        }

        .sucesso {
            text-align: center;
            padding: 50px 30px;
        }

        .check {
            width: 85px;
            height: 85px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            border-radius: 50%;
            background: #1d9b68;
            font-size: 42px;
        }

        .sucesso h1 {
            font-size: 35px;
            margin-bottom: 15px;
        }

        .sucesso p {
            color: #aeb3c0;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        footer {
            text-align: center;
            color: #777d8b;
            padding: 30px;
            border-top: 1px solid #242732;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            header {
                padding: 0 5%;
            }
            .logo-img {
                height: 42px;
            }
            .container {
                padding: 35px 0;
            }
            .caixa {
                padding: 25px;
            }
            .resumo {
                grid-template-columns: 1fr;
            }
            .total {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<header>
    <a href="?pagina=inicio" class="logo-link">
        <div class="logo-badge">
            <img 
                src="Cine_2.jpg" 
                alt="CinePop Cinema & Diversão" 
                class="logo-img"
                onerror="this.style.display='none'; document.getElementById('logo-texto-fallback').style.display='block';"
            >
            <div id="logo-texto-fallback" class="logo-texto" style="display: none;">
                Cine<span>Pop</span> 🎬
            </div>
        </div>
    </a>

    <div class="menu">
        <?php if ($pagina !== "inicio"): ?>
            <a href="?pagina=inicio">Início</a>
        <?php endif; ?>
    </div>
</header>

<main class="container">

<?php
/* =====================================================
   PÁGINA INICIAL
===================================================== */
if ($pagina === "inicio"):
?>

<section class="titulo">
    <h1>Viva o cinema no <span>CinePop</span></h1>
    <p>Escolha o seu filme e garanta já o seu bilhete.</p>
</section>

<div class="filmes">
<?php foreach ($filmes as $codigo => $filme): ?>
    <article class="filme">
        <img src="<?= htmlspecialchars($filme["imagem"]) ?>" alt="<?= htmlspecialchars($filme["nome"]) ?>">
        <div class="filme-conteudo">
            <div>
                <h2><?= htmlspecialchars($filme["nome"]) ?></h2>
                <p><?= htmlspecialchars($filme["descricao"]) ?></p>
            </div>
            <div>
                <div class="preco">
                    R$ <?= number_format($filme["preco"], 2, ",", ".") ?>
                </div>
                <a class="botao" href="?pagina=comprar&filme=<?= $codigo ?>">Comprar bilhete</a>
            </div>
        </div>
    </article>
<?php endforeach; ?>
</div>

<?php
/* =====================================================
   PÁGINA DE COMPRA
===================================================== */
elseif ($pagina === "comprar"):
    $filmeSelecionado = $_GET["filme"] ?? "";
?>

<div class="caixa">
    <h1>Comprar bilhete 🎟️</h1>
    <p class="subtitulo">Preencha os seus dados para continuar.</p>

    <?php if ($erro): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="acao" value="comprar">

        <label for="nome">O seu nome</label>
        <input type="text" id="nome" name="nome" placeholder="Introduza o seu nome" required>

        <label>Tipo de bilhete</label>
        <div class="opcoes">
            <label>
                <input type="radio" name="tipo" value="inteira" checked required>
                <span class="opcao">Inteira</span>
            </label>
            <label>
                <input type="radio" name="tipo" value="meia">
                <span class="opcao">Meia-entrada</span>
            </label>
        </div>

        <label for="quantidade">Quantidade</label>
        <input type="number" id="quantidade" name="quantidade" min="1" max="20" value="1" required>

        <label>Filme</label>
        <div class="opcoes">
        <?php foreach ($filmes as $codigo => $filme): ?>
            <label>
                <input type="radio" name="filme" value="<?= $codigo ?>" <?= $filmeSelecionado === $codigo ? "checked" : "" ?> required>
                <span class="opcao"><?= htmlspecialchars($filme["nome"]) ?></span>
            </label>
        <?php endforeach; ?>
        </div>

        <br>
        <button class="botao" type="submit">Continuar para o resumo →</button>
    </form>

    <a class="botao botao-secundario" href="?pagina=inicio">← Voltar</a>
</div>

<?php
/* =====================================================
   RESUMO E PAGAMENTO
===================================================== */
elseif ($pagina === "resumo" && $compra):
    $filme = $filmes[$compra["filme"]];
?>

<div class="caixa">
    <h1>Resumo da compra</h1>
    <p class="subtitulo">Confira os dados antes de efetuar o pagamento.</p>

    <?php if ($erro): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <div class="resumo">
        <div class="informacao">
            <small>Cliente</small>
            <strong><?= htmlspecialchars($compra["nome"]) ?></strong>
        </div>
        <div class="informacao">
            <small>Filme</small>
            <strong><?= htmlspecialchars($filme["nome"]) ?></strong>
        </div>
        <div class="informacao">
            <small>Quantidade</small>
            <strong><?= $compra["quantidade"] ?> bilhete(s)</strong>
        </div>
        <div class="informacao">
            <small>Tipo</small>
            <strong><?= $compra["tipo"] === "meia" ? "Meia-entrada" : "Inteira" ?></strong>
        </div>
    </div>

    <div class="total">
        <span>Valor total</span>
        <strong>R$ <?= number_format($compra["total"], 2, ",", ".") ?></strong>
    </div>

    <form method="POST">
        <input type="hidden" name="acao" value="pagamento">

        <label>Bandeira do cartão</label>
        <div class="opcoes">
            <label>
                <input type="radio" name="cartao" value="mastercard" required>
                <span class="opcao">Mastercard</span>
            </label>
            <label>
                <input type="radio" name="cartao" value="banco_brasil">
                <span class="opcao">Banco do Brasil</span>
            </label>
            <label>
                <input type="radio" name="cartao" value="santander">
                <span class="opcao">Santander</span>
            </label>
        </div>

        <label for="numero">Número do cartão</label>
        <input type="text" id="numero" name="numero" inputmode="numeric" placeholder="0000 0000 0000 0000" required>

        <label for="cvv">Código de Segurança (CVV)</label>
        <input type="password" id="cvv" name="cvv" maxlength="4" placeholder="123" required>

        <br>
        <button class="botao" type="submit">Confirmar pagamento ✓</button>
    </form>

    <form method="POST">
        <input type="hidden" name="acao" value="cancelar">
        <button class="botao botao-secundario" type="submit">Cancelar compra</button>
    </form>
</div>

<?php
/* =====================================================
   PAGAMENTO CONCLUÍDO
===================================================== */
elseif ($pagina === "sucesso"):
?>

<div class="caixa sucesso">
    <div class="check">✓</div>
    <h1>Pagamento concluído!</h1>
    <p>
        A sua compra foi realizada com sucesso!<br>
        Agora é só preparar as pipocas e aproveitar o filme. 🍿
    </p>

    <form method="POST">
        <input type="hidden" name="acao" value="cancelar">
        <button class="botao" type="submit">Voltar ao início</button>
    </form>
</div>

<?php endif; ?>

</main>

<footer>
    © CinePop — O seu cinema, a sua experiência 🎬
</footer>

</body>
</html>