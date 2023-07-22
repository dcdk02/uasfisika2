<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Hukum Ohm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .result {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Perhitungan</h2>
        <div class="result">
            <?php
            // Mendapatkan nilai tegangan dan arus dari form
            $voltage = $_POST['voltage'];
            $current = $_POST['current'];

            // Menghitung hambatan (R) menggunakan rumus Ohm
            $resistance = $voltage / $current;

            // Menampilkan hasil perhitungan
            echo "<p>Tegangan (V): $voltage V</p>";
            echo "<p>Arus (A): $current A</p>";
            echo "<p>Hambatan (R): $resistance ohm</p>";
            ?>
        </div>
    </div>
</body>
</html>
