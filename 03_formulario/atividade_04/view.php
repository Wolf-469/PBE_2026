<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade_01</title>
</head>
<body>
    <h1>Calcular Média do Aluno</h1>
    <form action="logica.php" method="POST">
        <label for="">Nome do Aluno:</label><br>
        <input type="text" name="nome" >
        <br><br>
        <label for="">Nota 1:</label>
        <input type="number" name="nota 1"  step = "0.1">
        <br><br>
        <label for="">Nota 2</label>
        <input type="number" name="nota 2" step = "0.1">
        <br><br>
         <label for="">Nota 3</label>
        <input type="number" name="nota 3" step = "0.1">
        <br><br>
        <button type="submit">Calcular média</button>
    </form>
</body>
</html>