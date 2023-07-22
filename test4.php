<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaya Magnet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        #container {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
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
    <h1>Kalkulator Gaya Magnet</h1>
    <div id="container">
        <form method="post" action="">
            <label for="current">Arus (Ampere):</label>
            <input type="number" step="any" name="current" id="current" required>
            
            <label for="length">Panjang Penghantar (meter):</label>
            <input type="number" step="any" name="length" id="length" required>
            
            <label for="magnetic_field">Medan Magnet (Tesla):</label>
            <input type="number" step="any" name="magnetic_field" id="magnetic_field" required>
            
            <input type="submit" value="Hitung">
        </form>
        
        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $current = $_POST["current"];
                $length = $_POST["length"];
                $magnetic_field = $_POST["magnetic_field"];
                
                // Hitung gaya magnet menggunakan rumus F = I * L * B
                $force = $current * $length * $magnetic_field;
                
                echo "Gaya magnet yang dihasilkan: " . $force . " Newton";
            }
            ?>
        </div>
    </div>
</body>
</html>
