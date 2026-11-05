<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Boletim Escolar</title>
</head>
<body>
    <h1>Boletim Escolar</h1>
    <p><strong>Aluno:</strong> <?= htmlspecialchars($aluno->getNome()) ?></p>
    <p><strong>Turma:</strong> <?= htmlspecialchars($aluno->getTurma()) ?></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= number_format($aluno->getNota1(), 1, ',', '') ?></td>
                <td><?= number_format($aluno->getNota2(), 1, ',', '') ?></td>
                <td><?= number_format($aluno->getNota3(), 1, ',', '') ?></td>
                <td><?= number_format($aluno->calcularMedia(), 1, ',', '') ?></td>
            </tr>
        </tbody>
    </table>

    <br>

    <p><strong>Faltas:</strong> <?= $aluno->getFaltas() ?></p>
    <p><strong>Frequência:</strong> <?= number_format($aluno->calcularFrequencia(), 1, ',', '') ?>%</p>

    <h2>Situação: <?= $aluno->verificarSituacao() ?></h2>

    <p>
        <?php if ($aluno->verificarSituacao() === "Aprovado"): ?>
            Parabéns, continue assim!
        <?php else: ?>
            Atenção: procure o professor para saber os próximos passos.
        <?php endif; ?>
    </p>

    <br>
    <a href="view.php">Voltar</a>
</body>
</html>
