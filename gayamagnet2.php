<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Gaya Magnet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .result {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalkulator Gaya Magnet</h1>
        <form action="" method="post">
            <input type="number" name="massa1" placeholder="Massa Benda 1 (kg)" required>
            <input type="number" name="massa2" placeholder="Massa Benda 2 (kg)" required>
            <input type="number" name="jarak" placeholder="Jarak (m)" required>
            <button type="submit">Hitung</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $massa1 = $_POST['massa1'];
            $massa2 = $_POST['massa2'];
            $jarak = $_POST['jarak'];

            // Rumus menghitung gaya magnet
            $gayaMagnet = (6.67 * pow(10, -11) * $massa1 * $massa2) / pow($jarak, 2);

            echo "<div class='result'>Gaya Magnet: " . $gayaMagnet . " N</div>";
        }
        ?>
    </div>
</body>
</html>
