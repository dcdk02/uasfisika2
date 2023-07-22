<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Hukum Ohm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            background-image: url(bg4.jpg);
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Hasil Perhitungan</h2>
        <div class="result">
            <?php
            if(isset($_POST['calculate'])){
                $voltage = $_POST['voltage'];
                $current = $_POST['current'];
                $resistance = $_POST['resistance'];

                if(!empty($voltage) && !empty($current)){
                    $resistance_result = $voltage / $current;
                    $result_round = round($resistance_result, 2);
                    echo "<div class='result'>Nilai Tegangan: $voltage V</div>";
                    echo "<div class='result'>Nilai Arus: $current A</div>";
                    echo "<div class='result'><strong>Nilai Resistansi: $result_round &#8486;</strong></div>";
                }
                elseif(!empty($voltage) && !empty($resistance)){
                    $current_result = $voltage / $resistance;
                    $result_round = round($current_result, 2);
                    echo "<div class='result'>Nilai Tegangan: $voltage V</div>";
                    echo "<div class='result'><strong>Nilai Arus: $result_round A</strong></div>";
                    echo "<div class='result'>Nilai Resistansi: $resistance &#8486;</div>";
                }
                elseif(!empty($current) && !empty($resistance)){
                    $voltage_result = $current * $resistance;
                    $result_round = round($voltage_result, 2);
                    echo "<div class='result'><strong>Nilai Tegangan: $result_round V</strong></div>";
                    echo "<div class='result'>Nilai Arus: $current A</div>";
                    echo "<div class='result'>Nilai Resistansi: $resistance &#8486;</div>";
                    
                }
                else{
                    echo "<div class='result'>Mohon masukkan dua nilai yang diketahui.</div>";
                }
            }
            ?>
            <input type="button" onclick="window.location.href='http://localhost/dimas/test2.php';" value="Kembali" class="btn">
        </div>
    </div>
</body>
</html>
