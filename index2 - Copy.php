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

        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
        <h2>Kalkulator Hukum Ohm</h2>
        <form method="post" action="kalkulator.php">
            <label for="voltage">Tegangan (V):</label>
            <input type="number" step="0.01" name="voltage" required>

            <label for="current">Arus (A):</label>
            <input type="number" step="0.01" name="current" required>

            <input type="submit" value="Hitung">
        </form>
    </div>
</body>
</html>
