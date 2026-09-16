<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>desafio_01</title>
</head>
<body>
    <h1>Calculadora de Salário Líquido<h1>
    <form action="logica.php" method="POST">
        <label for ="">nome do fucionário:</label>
        <input type="" name="funcionario">
        <br><br>
        <label for ="">Salário bruto:</label>
        <input type="number" name="salario_bruto">
        <br><br>
        <label for ="">Horas Extras:</label>
        <input type="number" name="horas_extras">
        <br><br>
         <label for ="">Benefícios:</label>
        <input type="number" name="beneficios">
        <br><br>
         <label for ="">Descontos:</label>
        <input type="number" name="descontos">
        <br><br>
        <button type="submit" >calcular Sálario</button>

    </form>
</body>
</html