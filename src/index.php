<?php
$pagina = $_POST['pagina'] ?? $_GET['pagina'] ?? 'inicio';

switch ($pagina) {
    case 'actual':   require "controladores/actual.php";   break;
    case 'horas':    require "controladores/horas.php";    break;
    case 'semana':   require "controladores/semana.php";   break;
    case 'historial':require "controladores/historial.php";break;
    default:         require "vistas/inicio.php";          break;
}
?>
