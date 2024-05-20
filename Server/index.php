<!DOCTYPE html>
<html>
<head>
    <title>Affichage de la Température</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }
        h1 {
            font-size: 2.5em;
            color: #333;
        }
        p {
            font-size: 2em;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: color 0.5s, background-color 0.5s;
            animation: fadeIn 1s ease-in-out;
            background: linear-gradient(90deg, #0000FF, #00FFFF, #00FF00, #FFFF00, #FFA500, #FF0000);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        #humidity {
            color: black;
            -webkit-text-fill-color: black;
        }
    </style>
    <script>
        function fetchTemperature() {
            fetch('get_temperature.php')
                .then(response => response.text())
                .then(data => {
                    const tempElement = document.getElementById('temperature');
                    const temperature = parseFloat(data);
                    tempElement.innerText = "Température : " + temperature + " °C";
                    updateTemperatureColor(tempElement, temperature);
                })
                .catch(error => console.error('Erreur:', error));
        }
        
        function fetchHumidity() {
            fetch('get_humidity.php')
                .then(response => response.text())
                .then(data => {
                    const humidityElement = document.getElementById('humidity');
                    const humidity = parseFloat(data);
                    humidityElement.innerText = "Humidité : " + humidity + " %";
                })
                .catch(error => console.error('Erreur:', error));
        }

        function updateTemperatureColor(element, temperature) {
            let gradientColors = ['#0000FF', '#00FFFF', '#00FF00', '#FFFF00', '#FFA500', '#FF0000'];
            let index;
            if (temperature < 5) {
                index = 0;
            } else if (temperature < 10) {
                index = 1;
            } else if (temperature < 20) {
                index = 2;
            } else if (temperature < 25) {
                index = 3;
            } else if (temperature < 30) {
                index = 4;
            } else {
                index = 5;
            }
            element.style.background = `linear-gradient(90deg, ${gradientColors[index]} 0%, ${gradientColors[index + 1]} 100%)`;
            element.style.webkitBackgroundClip = 'text';
            element.style.webkitTextFillColor = 'transparent';
        }

        setInterval(fetchTemperature, 500);
        setInterval(fetchHumidity, 500);

        window.onload = function() {
            fetchTemperature();
            fetchHumidity();
        };
    </script>
</head>
<body>
    <h1>Température Actuelle</h1>
    <p id="temperature">Chargement...</p>
    <p id="humidity">Chargement...</p>
</body>
</html>
