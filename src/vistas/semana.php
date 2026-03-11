<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Previsión semanal - <?php echo $ciudad; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Previsión semanal en <?php echo $ciudad; ?></h1>

    <?php
    $dias = [];
    foreach ($datos['list'] as $item) {
        $dia = date('d/m', $item['dt']);
        if (!isset($dias[$dia])) {
            $dias[$dia] = ['temps' => [], 'desc' => $item['weather'][0]['description']];
        }
        $dias[$dia]['temps'][] = $item['main']['temp'];
    }
    ?>

    <canvas id="grafico" width="600" height="300"></canvas>
    <script>
        new Chart(document.getElementById('grafico'), {
            type: 'bar',
            data: {
                labels: [<?php foreach ($dias as $dia => $info) echo '"' . $dia . '",'; ?>],
                datasets: [{
                    label: 'Temperatura media (°C)',
                    data: [<?php foreach ($dias as $info) echo round(array_sum($info['temps']) / count($info['temps']), 1) . ','; ?>],
                    backgroundColor: '#3498db'
                }]
            }
        });
    </script>

    <table border="1" cellpadding="8">
        <tr><th>Día</th><th>Temp. media (°C)</th><th>Descripción</th></tr>
        <?php foreach ($dias as $dia => $info): ?>
        <tr>
            <td><?php echo $dia; ?></td>
            <td><?php echo round(array_sum($info['temps']) / count($info['temps']), 1); ?></td>
            <td><?php echo $info['desc']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <form action="index.php" method="POST">
        <input type="hidden" name="ciudad" value="<?php echo $ciudad; ?>">
        <button name="pagina" value="actual">Tiempo actual</button>
        <button name="pagina" value="horas">Ver horas</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
