<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>El Tiempo</title></head>
<body>
    <h1>Consulta el tiempo</h1>

    <form action="index.php" method="POST">
        <input type="hidden" name="pagina" value="actual">
        <input type="text" name="ciudad" placeholder="Escribe una ciudad" required>
        <button type="submit">Buscar</button>
    </form>

    <br>
    <a href="index.php?pagina=historial">Ver historial</a>
</body>
</html>
