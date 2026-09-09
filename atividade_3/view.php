<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 03</title>
</head>
<body>
    <h1>Número<h1>
    <form action="logica.php" method="POST">
        <label for ="">numero 2:</label>
        <input type="number" name="numero1">
        <br><br>
        <label for ="">numero 2:</label>
        <input type="number" name="numero2">
        <br><br>
        
        <select name="Operacao" required>
            <option value="">Selecione a operação</option>
            <option value="som">Soma</option>
            <option value="sub">subtração</option>
            <option value="mult">mutiplicação</option>
            <option value="div">divisão</option>
</select>

        <br><br>
        <button type="reset" >limpar</button>
        <button type="submit" >enviar</button>

    </form>
</body>
</html