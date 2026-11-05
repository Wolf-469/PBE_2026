<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro do Boletim</title>
</head>
<body>
    <h2>Sistema de Boletim Escolar</h2>
    <form action="logica.php" method="POST">
        <label for="nome">Nome do Aluno:</label><br>
        <input type="text" name="nome" required><br><br>

        <label for="turma">Turma:</label><br>
        <select id="turma" name="turma" required>
            <option value="">Selecione uma turma</option>
            <option value="1º IDS">1º IDS</option>
            <option value="2º IDS">2º IDS</option>
            <option value="3º IDS">3º IDS</option>
        </select><br><br>

        <label for="nota1">Nota 1:</label><br>
        <input type="number" name="nota1" min="0" max="10" step="0.1" required><br><br>

        <label for="nota2">Nota 2:</label><br>
        <input type="number" name="nota2" min="0" max="10" step="0.1" required><br><br>

        <label for="nota3">Nota 3:</label><br>
        <input type="number" name="nota3" min="0" max="10" step="0.1" required><br><br>

        <label for="faltas">Faltas:</label><br>
        <input type="number" name="faltas" min="0" max="80" required><br><br>

        <button type="submit">Gerar Boletim</button>
    </form>
</body>
</html>
