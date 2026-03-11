<?php
require_once __DIR__ . "/../config/config.php";

function geolocalizar($ciudad) {
    global $API_KEY;
    $url = "http://api.openweathermap.org/geo/1.0/direct?q=" . urlencode($ciudad) . "&limit=1&appid=$API_KEY";
    return json_decode(file_get_contents($url), true);
}

function getTiempoActual($lat, $lon) {
    global $API_KEY;
    $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&lang=es&appid=$API_KEY";
    return json_decode(file_get_contents($url), true);
}

function getForecast($lat, $lon) {
    global $API_KEY;
    $url = "https://api.openweathermap.org/data/2.5/forecast?lat=$lat&lon=$lon&units=metric&lang=es&appid=$API_KEY";
    return json_decode(file_get_contents($url), true);
}
?>
