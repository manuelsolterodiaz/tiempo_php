<?php
require_once __DIR__ . "/../modelos/weather.php";
require_once __DIR__ . "/../modelos/consultas.php";

$ciudad = $_POST['ciudad'] ?? '';
$geo = geolocalizar($ciudad);

if (empty($geo)) {
    require __DIR__ . "/../vistas/error.php";
    exit;
}

$lat = $geo[0]['lat'];
$lon = $geo[0]['lon'];
$datos = getForecast($lat, $lon);
guardarConsulta($ciudad, 'horas');
require __DIR__ . "/../vistas/horas.php";
?>
