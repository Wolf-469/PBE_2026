<?php
// 1. Inicia a sessão para permitir guardar dados entre páginas
session_start();

// Mapeamento dos filmes em cartaz
$filmes = [
    "coracao_selvagem" => [
        "titulo" => "Coração Selvagem",
        "imagem" => "coracao.png",
        "preco"  => 30.00,
        "genero" => "Ação / Drama"
    ],
    "homem_aranha" => [
        "titulo" => "Homem-Aranha",
        "imagem" => "aranha.jpg",
        "preco"  => 32.00,
        "genero" => "Ação / Aventura"
    ],
    "vingadores" => [
        "titulo" => "Vingadores: Ultimato",
        "imagem" => "vingadores.png",
        "preco"  => 35.00,
        "genero" => "Ficção / Ação"
    ]
];

// 2. Processa o formulário quando enviado via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $filmeId = $_POST["filme"] ?? "";
    $nome = trim($_POST["nome"] ?? "Cliente");
    $quantidade = (int)($_POST["quantidade"] ?? 1);
    $tipo = $_POST["tipo"] ?? "inteira";

    // Valida se o filme existe
    if (isset($filmes[$filmeId]) && $quantidade > 0) {
        $precoBase = $filmes[$filmeId]["preco"];
        $precoUnitario = ($tipo === "meia") ? ($precoBase / 2) : $precoBase;
        $total = $precoUnitario * $quantidade;

        // 3. Salva a compra na SESSÃO
        $_SESSION["compra"] = [
            "filme"      => $filmeId,
            "nome"       => $nome,
            "quantidade" => $quantidade,
            "tipo"       => $tipo,
            "preco"      => $precoUnitario,
            "total"      => $total
        ];

        // 4. Redireciona para a página de confirmação
        header("Location: confirmacao.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePop | Catálogo</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f7; color: #222; }
        header { height: 90px; background: white; display: flex; align-items: center; padding: 8px 7%; border-bottom: 1px solid #e5e5e5; box-shadow: 0 3px 15px rgba(0,0,0,0.08); }
        .logo { height: 70px; object-fit: contain; }
        .container { width: min(1100px, 92%); margin: 40px auto; }
        .titulo-pagina { text-align: center; font-size: 32px; margin-bottom: 30px; }
        .titulo-pagina span { color: #b3132b; }
        .grid-filmes { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .card-filme { background: white; border-radius: 18px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.08); display: flex; flex-direction: column; }
        .capa-container { width: 100%; height: 420px; background: #111; }
        .capa-filme { width: 100%; height: 100%; object-fit: cover; }
        .info-filme { padding: 22px; display: flex; flex-direction: column; flex-grow: 1; }
        .info-filme h2 { font-size: 22px; margin-bottom: 6px; }
        .genero { color: #777; font-size: 14px; margin-bottom: 15px; }
        .preco-tag { font-size: 18px; font-weight: bold; color: #b3132b; margin-bottom: 20px; }
        .form-compra { display: flex; flex-direction: column; gap: 12px; margin-top: auto; }
        .campo { display: flex; flex-direction: column; gap: 5px; }
        .campo label { font-size: 13px; font-weight: bold; color: #555; }
        .campo input, .campo select { padding: 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
        .btn-comprar { background: #b3132b; color: white; border: none; padding: 13px; border-radius: 10px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.25s; }
        .btn-comprar:hover { background: #8f0e21; }
    </style>
</head>
<body>

    <header>
        <a href="index.php"><img src="logo.png" class="logo" alt="CinePop"></a>
    </header>

    <main class="container">
        <h1 class="titulo-pagina">Filmes em <span>Cartaz</span></h1>

        <div class="grid-filmes">
            <?php foreach ($filmes as $id => $filme): ?>
                <div class="card-filme">
                    <div class="capa-container">
                        <img src="<?= htmlspecialchars($filme['imagem']) ?>" alt="<?= htmlspecialchars($filme['titulo']) ?>" class="capa-filme">
                    </div>
                    <div class="info-filme">
                        <h2><?= htmlspecialchars($filme['titulo']) ?></h2>
                        <span class="genero"><?= htmlspecialchars($filme['genero']) ?></span>
                        <div class="preco-tag">Ingresso a partir de R$ <?= number_format($filme['preco'] / 2, 2, ',', '.') ?></div>

                        <form action="index.php" method="POST" class="form-compra">
                            <input type="hidden" name="filme" value="<?= $id ?>">

                            <div class="campo">
                                <label for="nome_<?= $id ?>">Seu Nome:</label>
                                <input type="text" id="nome_<?= $id ?>" name="nome" placeholder="Digite seu nome" required>
                            </div>

                            <div class="campo">
                                <label for="qtd_<?= $id ?>">Quantidade:</label>
                                <input type="number" id="qtd_<?= $id ?>" name="quantidade" value="1" min="1" max="10" required>
                            </div>

                            <div class="campo">
                                <label for="tipo_<?= $id ?>">Tipo de Ingresso:</label>
                                <select id="tipo_<?= $id ?>" name="tipo">
                                    <option value="inteira">Inteira (R$ <?= number_format($filme['preco'], 2, ',', '.') ?>)</option>
                                    <option value="meia">Meia-entrada (R$ <?= number_format($filme['preco'] / 2, 2, ',', '.') ?>)</option>
                                </select>
                            </div>

                            <button type="submit" class="btn-comprar">Garantir Ingresso</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>