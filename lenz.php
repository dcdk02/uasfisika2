<!DOCTYPE html>
<html>
<head>
    <title>Hukum Lenz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        label {
            display: inline-block;
            width: 120px;
            text-align: left;
        }

        input[type="number"] {
            width: 200px;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hukum Lenz</h1>
        <form method="post" action="">
            <label for="flux">Flux (Wb):</label>
            <input type="number" name="flux" id="flux" required step="any"><br><br>
            <label for="time">Time (s):</label>
            <input type="number" name="time" id="time" required step="any"><br><br>
            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $flux = $_POST["flux"];
            $time = $_POST["time"];

            $emf = -($flux / $time); // Menggunakan tanda negatif karena hukum Lenz menyatakan bahwa arah induksi akan berlawanan dengan perubahan fluks
            echo "<h2>Hasil:</h2>";
            echo "<p>EMF (V): " . $emf . "</p>";
        }
        ?>
    </div>
</body>
</html>
