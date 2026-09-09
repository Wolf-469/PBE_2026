<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 01</title>
</head>
<body>
    <h1>Cadastro de usuário<h1> 
    <form action="logica.php" method="POST">
        <label for ="">Nome:</label>
        <input type="text" name="nome">
        <br><br>
        <label for ="">Email:</label>
        <input type="email" name="email">
        <br><br>
        <label for ="">Senha:</label>
        <input type="password" name="senha">
        <br><br>
        <button type="submit" >cadastrar</button>
        <button type="submit" >limpar</button>
    </form>
</body>
</html