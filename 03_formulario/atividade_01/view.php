<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo</title>
</head>
<body>
    <h1>Calcular IMC</h1>
    <form action="logica.php" method="POST">
        <label for="">Nome:</label><br>
        <input type="text" name="nome" required><br><br>
        <label for="">Sobrenome:</label><br>
        <input type="text" name="sobrenome" required><br><br>
        <label for="">Ano de Nascimento:</label><br>
        <input type="date" name="data_nascimento" required><br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>