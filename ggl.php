<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator GGL Induksi</title>
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
    <h1>Kalkulator GGL Induksi</h1>
    <div id="container">
        <form method="post" action="">
            <label for="magnetic_flux">Fluks Magnetik (Weber):</label>
            <input type="number" step="any" name="magnetic_flux" id="magnetic_flux" required>
            
            <label for="time">Waktu (detik):</label>
            <input type="number" step="any" name="time" id="time" required>
            
            <input type="submit" value="Hitung">
        </form>
        
        <div id="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $magnetic_flux = $_POST["magnetic_flux"];
                $time = $_POST["time"];
                
                // Hitung GGL Induksi menggunakan rumus E = -d(Φ)/dt
                $induced_emf = -($magnetic_flux / $time);
                
                echo "GGL Induksi yang dihasilkan: " . $induced_emf . " Volt";
            }
            ?>
        </div>
    </div>
</body>
</html>
