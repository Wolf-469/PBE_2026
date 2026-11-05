
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Holerite - TechNova</title>
</head>
<body>

    <h1>Holerite</h1>

    <h3>Funcionário: <?php echo $funcionario->getNome(); ?></h3>
    <h3>Cargo: <?php echo $funcionario->getCargo(); ?></h3>

    <table border="1" cellpadding="10">

        <tr>
            <th>Descrição</th>
            <th>Proventos</th>
            <th>Descontos</th>
        </tr>

        <tr>
            <td>Salário base</td>
            <td>
                R$ <?php echo number_format(
                    $funcionario->getSalarioBase(), 2, ',', '.'
                ); ?>
            </td>
            <td>-</td>
        </tr>

        <tr>
            <td>
                Horas extras
                (<?php echo $funcionario->getHorasExtras(); ?> horas)
            </td>

            <td>
                R$ <?php echo number_format(
                    $funcionario->calcularHorasExtras(), 2, ',', '.'
                ); ?>
            </td>

            <td>-</td>
        </tr>

        <tr>
            <td>
                INSS
                (<?php echo $funcionario->calcularPercentualINSS(); ?>%)
            </td>

            <td>-</td>

            <td>
                R$ <?php echo number_format(
                    $funcionario->calcularINSS(), 2, ',', '.'
                ); ?>
            </td>
        </tr>

        <tr>
            <td>Vale-transporte</td>

            <td>-</td>

            <td>
                R$ <?php echo number_format(
                    $funcionario->calcularValeTransporte(), 2, ',', '.'
                ); ?>
            </td>
        </tr>

    </table>

    <h2>
        Salário bruto: R$
        <?php echo number_format(
            $funcionario->calcularSalarioBruto(), 2, ',', '.'
        ); ?>
    </h2>

    <h2>
        Salário líquido: R$
        <?php echo number_format(
            $funcionario->calcularSalarioLiquido(), 2, ',', '.' ); ?>
    </h2>

    <br>

    <a href="view.php">Voltar</a>

</body>
</html>
