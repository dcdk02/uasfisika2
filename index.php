<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Fisika - Hukum Ohm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url(bg3.jpg);
            background-size: cover;
            height: 500px;
            position: relative;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: cornflowerblue;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalkulator Fisika - Hukum Ohm</h1>
        <form method="post" action="kalkulator.php">
            <label for="voltage">Tegangan (V)</label>
            <input type="number" step="0.01" name="voltage" id="voltage" >
            <label for="current">Arus (A)</label>
            <input type="number" step="0.01" name="current" id="current" >
            <label for="resistance">Resistansi (&#8486;)</label>
            <input type="number" step="0.01" name="resistance" id="resistance" >
            <input type="submit" name="calculate" value="Hitung" class="btn">
        </form>
    </div>
</body>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      font-size: 15px;
      color: #000;
      padding: 10px;
    }
  </style>
</head>
<body>
  <div class="footer">
    Dimas Cahyo Dwikusuma
    2255201035
    Teknik Informatika
    &copy; DCDK 2023
  </div>
</body>
</html>
</html>
