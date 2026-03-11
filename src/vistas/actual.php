<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tiempo actual - <?php echo $ciudad; ?></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Tiempo actual en <?php echo $ciudad; ?></h1>

    <p>Temperatura: <?php echo $datos['main']['temp']; ?> °C</p>
    <p>Sensación térmica: <?php echo $datos['main']['feels_like']; ?> °C</p>
    <p>Humedad: <?php echo $datos['main']['humidity']; ?> %</p>
    <p>Viento: <?php echo $datos['wind']['speed']; ?> m/s</p>
    <p>Descripción: <?php echo $datos['weather'][0]['description']; ?></p>

    <canvas id="grafico" width="400" height="200"></canvas>
    <script>
        new Chart(document.getElementById('grafico'), {
            type: 'bar',
            data: {
                labels: ['Temp (°C)', 'Sensación (°C)', 'Humedad (%)'],
                datasets: [{
                    label: '<?php echo $ciudad; ?>',
                    data: [<?php echo $datos['main']['temp']; ?>, <?php echo $datos['main']['feels_like']; ?>, <?php echo $datos['main']['humidity']; ?>],
                    backgroundColor: ['#f39c12', '#e74c3c', '#3498db']
                }]
            }
        });
    </script>

    <br>
    <form action="index.php" method="POST">
        <input type="hidden" name="ciudad" value="<?php echo $ciudad; ?>">
        <button name="pagina" value="horas">Ver previsión por horas</button>
        <button name="pagina" value="semana">Ver previsión semanal</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>
