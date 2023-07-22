<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Fisika - Hukum Ohm</title>
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
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
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
        <form method="post" action="">
            <label for="voltage">Tegangan (V)</label>
            <input type="number" step="0.01" name="voltage" id="voltage" >
            <label for="current">Arus (A)</label>
            <input type="number" step="0.01" name="current" id="current" >
            <label for="resistance">Resistansi (&#8486;)</label>
            <input type="number" step="0.01" name="resistance" id="resistance" >
            <input type="submit" name="calculate" value="Hitung" class="btn">
        </form>
        <?php
        if(isset($_POST['calculate'])){
            $voltage = $_POST['voltage'];
            $current = $_POST['current'];
            $resistance = $_POST['resistance'];

            if(!empty($voltage) && !empty($current)){
                $resistance_result = $voltage / $current;
                $result_round = round($resistance_result, 2);
                echo "<div class='result'>Nilai Resistansi: $result_round &#8486;</div>";
            }
            elseif(!empty($voltage) && !empty($resistance)){
                $current_result = $voltage / $resistance;
                $result_round = round($current_result, 2);
                echo "<div class='result'>Nilai Arus: $result_round A</div>";
            }
            elseif(!empty($current) && !empty($resistance)){
                $voltage_result = $current * $resistance;
                $result_round = round($voltage_result, 2);
                echo "<div class='result'>Nilai Tegangan: $result_round V</div>";
            }
            else{
                echo "<div class='result'>Mohon masukkan dua nilai yang diketahui.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
