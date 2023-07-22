<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Medan Magnet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        h1 {
            text-align: center;
        }
        
        #container {
            width: 300px;
            margin: 0 auto;
        }
        
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        
        #result {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Kalkulator Medan Magnet</h1>
    <div id="container">
        <form method="post" action="">
            <label for="current">Arus (Ampere):</label>
            <input type="number" step="any" name="current" id="current" required>
            
            <label for="length">Panjang Penghantar (meter):</label>
            <input type="number" step="any" name="length" id="length" required>
            
            <label for="distance">Jarak dari Penghantar (meter):</label>
            <input type="number" step="any" name="distance" id="distance" required>
            
            <input type="submit" value="Hitung">
        </form>
        
        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $current = $_POST["current"];
                $length = $_POST["length"];
                $distance = $_POST["distance"];
                
                // Hitung medan magnet menggunakan rumus B = (mu0 * I * L) / (2 * pi * r)
                $mu0 = 4 * pi(); // Nilai konstan mu0 (permeabilitas ruang hampa)
                $r = $distance;
                $B = ($mu0 * $current * $length) / (2 * pi() * $r);
                
                echo "Medan magnet yang dihasilkan: " . $B . " Tesla";
            }
            ?>
        </div>
    </div>
</body>
</html>
