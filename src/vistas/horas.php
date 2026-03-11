<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Previsión por horas - <?php echo $ciudad; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Previsión por horas en <?php echo $ciudad; ?></h1>

    <?php
    $hoy = date('Y-m-d');
    $entradas = [];
    foreach ($datos['list'] as $item) {
        if (strpos($item['dt_txt'], $hoy) !== false) {
            $entradas[] = $item;
        }
    }
    if (count($entradas) < 2) {
        $entradas = array_slice($datos['list'], 0, 8);
    }
    ?>

    <canvas id="grafico" width="600" height="300"></canvas>
    <script>
        new Chart(document.getElementById('grafico'), {
            type: 'line',
            data: {
                labels: [<?php foreach ($entradas as $e) echo '"' . date('H:i', $e['dt']) . '",'; ?>],
                datasets: [{
                    label: 'Temperatura (°C)',
                    data: [<?php foreach ($entradas as $e) echo $e['main']['temp'] . ','; ?>],
                    borderColor: '#e74c3c',
                    fill: false
                }]
            }
        });
    </script>

    <table border="1" cellpadding="8">
        <tr><th>Hora</th><th>Temperatura (°C)</th><th>Humedad (%)</th><th>Descripción</th></tr>
        <?php foreach ($entradas as $e): ?>
        <tr>
            <td><?php echo date('H:i', $e['dt']); ?></td>
            <td><?php echo $e['main']['temp']; ?></td>
            <td><?php echo $e['main']['humidity']; ?></td>
            <td><?php echo $e['weather'][0]['description']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <form action="index.php" method="POST">
        <input type="hidden" name="ciudad" value="<?php echo $ciudad; ?>">
        <button name="pagina" value="actual">Tiempo actual</button>
        <button name="pagina" value="semana">Ver semana</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
