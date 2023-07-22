<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Fisika - Hukum Ohm</title>
</head>
<body>
    <h2>Kalkulator Fisika - Hukum Ohm</h2>
    <form method="post" action="">
        <label>Nilai Tegangan (V):</label>
        <input type="text" name="tegangan" required><br><br>
        
        <label>Nilai Arus (I):</label>
        <input type="text" name="arus" required><br><br>
        
        <input type="submit" name="hitung" value="Hitung">
    </form>

    <?php
    if(isset($_POST['hitung'])){
        $tegangan = $_POST['tegangan'];
        $arus = $_POST['arus'];

        // Menghitung hambatan
        $hambatan = $tegangan / $arus;

        echo "<br>Hasil: <strong>".$hambatan." Ohm</strong>";
    }
    ?>
</body>
</html>
