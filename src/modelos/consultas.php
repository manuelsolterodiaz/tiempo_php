<?php
require_once __DIR__ . "/conexion.php";

function guardarConsulta($ciudad, $tipo) {
    $pdo = conectar();
    $stmt = $pdo->prepare("INSERT INTO consultas (ciudad, tipo) VALUES (?, ?)");
    $stmt->execute([$ciudad, $tipo]);
}

function obtenerConsultas() {
    $pdo = conectar();
    $stmt = $pdo->query("SELECT * FROM consultas ORDER BY fecha DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
