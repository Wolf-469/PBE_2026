<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade LM</title>
</head>
<body>
    <h2 style="color:#7D007E">Inscrição em Eventos</h2>
    <form action="logica.php" method="POST" style = "background-color:#F4E5F6;padding:15px;border-radius:8px; width:350px;">
        <label for="nome">Nome completo:</label>
        <input type="text" name="nome" id="nome" style="width:100%; margin-button:10px;color:purple;font-family:Arial;">
        <br><br>
        <label for="ingresso">Tipo de ingresso:</label>
        <select name="nome"  style="width:100%; margin-button:10px;color:purple;">
            <option>Estudante</option>
            <option>Profissional</option>
            <option>VIP</option>
        </select>
        <br><br>
        <label for="data">Data do Evento:</label>
        <input type="date" name="data" id="data" style="color:purple;">
        <br><br>
        <label for="hora">Hora de chegada:</label>
        <input type="time" name="hora" id="hora" style="color:purple;">
        <br><br>
        <button type="submit" style ="background:purple; color:whiter;padding:5px">Inscrever-se</button>
</form>
</body>
</html>