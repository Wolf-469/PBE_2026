<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinePop | Cinema e Diversão</title>
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
            text-align: center;
        }
        header {
            background-color: #7a3939;
            padding: 25px 20px;
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .logo {
            max-width: 180px;
            height: auto;
            margin-bottom: 10px;
        }
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .grid-filmes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        .card-filme {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.2s ease;
        }
        .card-filme:hover {
            transform: translateY(-5px);
        }
        .card-filme img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
        }
        .card-filme h3 {
            margin: 15px 0 8px;
            color: #7a3939;
        }
        .card-filme p {
            font-weight: bold;
            color: #555;
        }
        .btn-comprar {
            display: inline-block;
            margin-top: 35px;
            padding: 14px 28px;
            background-color: #b3132b;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            transition: background 0.2s ease;
        }
        .btn-comprar:hover {
            background-color: #8f0e21;
        }
    </style>
</head>
<body>

    <header>
        <img src="Cine.png" alt="Logo CinePop" class="logo">
        <h1>Bem-vindos ao site da CinePop!</h1>
        <p style="margin-top: 8px;">Um dos melhores cinemas da região!</p>
    </header>

    <main class="container">
        <h2>Opções da semana!</h2>

        <div class="grid-filmes">
            <div class="card-filme">
                <img src="coracao.png" alt="Coração Selvagem">
                <h3>Coração Selvagem</h3>
                <p>Inteira: R$ 20,00</p>
            </div>

            <div class="card-filme">
                <img src="vingadores.png" alt="Vingadores">
                <h3>Vingadores</h3>
                <p>Inteira: R$ 30,00</p>
            </div>

            <div class="card-filme">
                <img src="aranha.jpg" alt="Homem-Aranha">
                <h3>Homem-Aranha</h3>
                <p>Inteira: R$ 25,00</p>
            </div>
        </div>

        <a href="view.php" class="btn-comprar">Interessado? Clique aqui para comprar seu ticket!</a>
    </main>

</body>
</html>