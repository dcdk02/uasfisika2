<!DOCTYPE html>
<html>
<head>
    <title>Gaya Magnet</title>
    <style>
        /* CSS untuk tampilan */
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
        }
        #magnet-image {
            width: 150px;
            height: 150px;
            margin: 0 auto;
            display: block;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gaya Magnet</h1>
        <img src="magnet.png" id="magnet-image" alt="Magnet Image">
        <p>
            PHP dapat menghasilkan efek gaya magnet.
        </p>
        <p>
            <!-- PHP untuk menghitung gaya magnet -->
            <?php
            // Konstanta
            $konstanta = 9.81;
            
            // Massa benda dan medan magnet
            $massa = 2; // kg
            $medan_magnet = 1.5; // T (Tesla)
            
            // Menghitung gaya magnet
            $gaya_magnet = $massa * $medan_magnet * $konstanta;
            
            // Menampilkan hasil
            echo "Gaya Magnet: " . $gaya_magnet . " N";
            ?>
        </p>
    </div>
</body>
</html>
