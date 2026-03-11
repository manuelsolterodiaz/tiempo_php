<?php
require_once __DIR__ . "/../config/config.php";

function conectar() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;
    return new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASS);
}
?>
