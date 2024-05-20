<?php
if (file_exists('temperature_data.txt')) {
    echo file_get_contents('temperature_data.txt');
} else {
    echo "Aucune";
}
?>
