<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 6</title>
</head>
<body>
    <h1>Compra de Ingressos</h1>
    <form action="logica.php" method="POST">
        <label for="">Nome do cliente: </label>
        <input type="text" name="nome" >
        <br><br>
        <label for="">Filme: </label>
        <input type="text" name="filme" >
        <br><br>
        <label for="">Quantidade de Ingressos: </label>
        <input type="number" name="quantidade">
        <br><br>

        <label for="">Tipo ingresso</label>
        <br><br>

        <input type="radio" name="tipo" value=""inteira>
        <label for="">Inteira</label>
        <br>
        <input type="radio" name="tipo" value="meia">
        <label for="">Meia</label>

        <br><br>
        <button type="submit">Comprar Ingressos</button>
</body>
</html>