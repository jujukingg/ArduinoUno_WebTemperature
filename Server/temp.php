<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $temperature = isset($_POST['temperature']) ? $_POST['temperature'] : null;
    $humidity = isset($_POST['humidity']) ? $_POST['humidity'] : null;

    if ($temperature !== null) {
        file_put_contents('temperature_data.txt', $temperature);
        echo "Température reçue : " . $temperature . " °C\n";
    }

    if ($humidity !== null) {
        file_put_contents('humidity_data.txt', $humidity);
        echo "Humidité reçue : " . $humidity . " %";
    }

    if ($temperature === null && $humidity === null) {
        echo "Aucune donnée reçue.";
    }
} else {
    echo "Aucune donnée POST reçue.";
}
?>
