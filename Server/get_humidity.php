<?php
if (file_exists('humidity_data.txt')) {
    echo file_get_contents('humidity_data.txt');
} else {
    echo "Aucune";
}
?>
