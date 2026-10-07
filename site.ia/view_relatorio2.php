<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePop | Pagamento Efetuado</title>
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
            max-width: 550px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .icon-success {
            font-size: 50px;
            color: #198754;
            margin-bottom: 15px;
        }
        h2 {
            color: #7a3939;
            margin-bottom: 15px;
        }
        p {
            color: #555;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        .btn-inicio {
            display: inline-block;
            padding: 12px 24px;
            background-color: #b3132b;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.2s;
        }
        .btn-inicio:hover {
            background-color: #8f0e21;
        }
    </style>
</head>
<body>

    <header>
        <h1>CinePop</h1>
    </header>

    <main class="container">
        <div class="icon-success">✓</div>
        <h2>Pagamento concluído com sucesso ^^!</h2>
        <p>Se tiver ocorrido algum erro ou se tiver alguma dúvida, envie um e-mail para: <br><strong>Ajuda.cinema.cinepop@proton.me</strong></p>

        <a href="comeco.php" class="btn-inicio">Clique aqui para voltar à página inicial!</a>
    </main>

</body>
</html>