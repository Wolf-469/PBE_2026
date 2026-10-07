<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePop | Comprar Ticket</title>
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
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        h2 {
            margin-bottom: 20px;
            color: #7a3939;
            text-align: center;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label.title {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }
        .options-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .options-group label {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #b3132b;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }
        button:hover {
            background-color: #8f0e21;
        }
    </style>
</head>
<body>

    <header>
        <h1>CinePop</h1>
    </header>

    <main class="container">
        <h2>Insira as informações abaixo para comprar!</h2>

        <form action="processa.php" method="POST">
            <div class="form-group">
                <label class="title" for="nome_cliente">Seu nome:</label>
                <input type="text" id="nome_cliente" name="nome_cliente" placeholder="Digite seu nome completo" required>
            </div>

            <div class="form-group">
                <label class="title">Filme:</label>
                <div class="options-group">
                    <label><input type="radio" name="filme" value="coracao_selvagem" required> Coração Selvagem</label>
                    <label><input type="radio" name="filme" value="homem_aranha"> Homem-Aranha</label>
                    <label><input type="radio" name="filme" value="vingadores"> Vingadores</label>
                </div>
            </div>

            <div class="form-group">
                <label class="title">Tipo de ingresso:</label>
                <div class="options-group">
                    <label><input type="radio" name="tipo" value="inteira" checked required> Inteira</label>
                    <label><input type="radio" name="tipo" value="meia"> Meia-entrada</label>
                </div>
            </div>

            <div class="form-group">
                <label class="title" for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" value="1" min="1" max="10" required>
            </div>

            <button type="submit">Avançar para o Resumo</button>
        </form>
    </main>

</body>
</html>