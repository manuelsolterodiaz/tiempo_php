<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Historial</title></head>
<body>
    <h1>Historial de consultas</h1>

    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Ciudad</th><th>Tipo</th><th>Fecha</th></tr>
        <?php foreach ($consultas as $c): ?>
        <tr>
            <td><?php echo $c['id']; ?></td>
            <td><?php echo $c['ciudad']; ?></td>
            <td><?php echo $c['tipo']; ?></td>
            <td><?php echo $c['fecha']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="index.php">Volver</a>
</body>
</html>
