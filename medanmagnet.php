<?php
// Fungsi untuk menghitung medan magnet
function calculateMagneticField($current, $distance, $length)
{
    // Konstanta permeabilitas ruang hampa
    $permeability = 4 * M_PI * pow(10, -7);

    // Menghitung medan magnet
    $magneticField = ($permeability * $current * $length) / (2 * M_PI * $distance);

    return $magneticField;
}

// Array penghantar dan panjangnya
$conductors = array(
    array('name' => 'Kawat Lurus', 'length' => 1),
    array('name' => 'Lingkaran', 'length' => 2 * M_PI),
    // Tambahkan jenis penghantar lainnya di sini
);

// Array arus yang diuji
$currents = array(1, 2, 3);

// HTML untuk tampilan
$html = '<html><head><style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style></head><body>';

$html .= '<table><tr><th>Penghantar</th>';
foreach ($currents as $current) {
    $html .= '<th>Arus ' . $current . ' A</th>';
}
$html .= '</tr>';

foreach ($conductors as $conductor) {
    $html .= '<tr><td>' . $conductor['name'] . '</td>';
    foreach ($currents as $current) {
        $magneticField = calculateMagneticField($current, 1, $conductor['length']);
        $html .= '<td>' . $magneticField . '</td>';
    }
    $html .= '</tr>';
}

$html .= '</table></body></html>';

echo $html;
?>
