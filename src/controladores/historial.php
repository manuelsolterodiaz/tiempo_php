<?php
require_once __DIR__ . "/../modelos/consultas.php";

$consultas = obtenerConsultas();
require __DIR__ . "/../vistas/historial.php";
?>
