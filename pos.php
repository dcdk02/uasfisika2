<?php
// Koneksi ke database
$host = 'localhost';
$username = 'username_db';
$password = 'password_db';
$database = 'nama_db';

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Fungsi untuk mendapatkan data pelanggan dari database
function getDataPelanggan() {
    global $conn;
    $query = "SELECT * FROM pelanggan";
    $result = mysqli_query($conn, $query);
    $data_pelanggan = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_pelanggan[$row['id']] = $row;
        }
    }
    return $data_pelanggan;
}

// Fungsi untuk mendapatkan data barang dari database
function getDataBarang() {
    global $conn;
    $query = "SELECT * FROM barang";
    $result = mysqli_query($conn, $query);
    $data_barang = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_barang[$row['id']] = $row;
        }
    }
    return $data_barang;
}

// Fungsi untuk menambah penjualan
function tambahPenjualan($tanggal, $barang_id, $pelanggan_id, $jumlah) {
    global $conn;
    $query = "INSERT INTO penjualan (tanggal, barang_id, pelanggan_id, jumlah) VALUES ('$tanggal', $barang_id, $pelanggan_id, $jumlah)";
    mysqli_query($conn, $query);
}

// Fungsi untuk mendapatkan laporan penjualan harian
function getLaporanPenjualanHarian($tanggal) {
    global $conn;
    $query = "SELECT barang.nama AS nama_barang, penjualan.jumlah, barang.harga
              FROM penjualan
              INNER JOIN barang ON penjualan.barang_id = barang.id
              WHERE penjualan.tanggal = '$tanggal'";
    $result = mysqli_query($conn, $query);
    $data_penjualan = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_penjualan[] = $row;
        }
    }
    return $data_penjualan;
}

// Fungsi untuk mendapatkan laporan penjualan mingguan
function getLaporanPenjualanMingguan($tanggal_awal, $tanggal_akhir) {
    global $conn;
    $query = "SELECT barang.nama AS nama_barang, SUM(penjualan.jumlah) AS total_jumlah, barang.harga
              FROM penjualan
              INNER JOIN barang ON penjualan.barang_id = barang.id
              WHERE penjualan.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'
              GROUP BY penjualan.barang_id";
    $result = mysqli_query($conn, $query);
    $data_penjualan = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_penjualan[] = $row;
        }
    }
    return $data_penjualan;
}

// Fungsi untuk mendapatkan laporan penjualan bulanan
function getLaporanPenjualanBulanan($bulan, $tahun) {
    global $conn;
    $query = "SELECT barang.nama AS nama_barang, SUM(penjualan.jumlah) AS total_jumlah, barang.harga
              FROM penjualan
              INNER JOIN barang ON penjualan.barang_id = barang.id
              WHERE MONTH(penjualan.tanggal) = $bulan AND YEAR(penjualan.tanggal) = $tahun
              GROUP BY penjualan.barang_id";
    $result = mysqli_query($conn, $query);
    $data_penjualan = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_penjualan[] = $row;
        }
    }
    return $data_penjualan;
}

// Fungsi untuk mengecek login user
function cekLogin($username, $password) {
    global $conn;
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Point of Sale</title>
    <!-- Masukkan link CSS dari framework Bootstrap di sini -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Form Penjualan -->
        <div class="card">
            <div class="card-header">
                Form Penjualan
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pelanggan">Pelanggan</label>
                        <select name="pelanggan" id="pelanggan" class="form-control" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            <?php foreach (getDataPelanggan() as $id => $pelanggan) : ?>
                                <option value="<?php echo $id; ?>"><?php echo $pelanggan['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="barang">Barang</label>
                        <select name="barang" id="barang" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php foreach (getDataBarang() as $id => $barang) : ?>
                                <option value="<?php echo $id; ?>"><?php echo $barang['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah Penjualan</button>
                </form>
            </div>
        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) : ?>
            <?php
            $tanggal = $_POST['tanggal'];
            $barang_id = $_POST['barang'];
            $pelanggan_id = $_POST['pelanggan'];
            $jumlah = $_POST['jumlah'];
            tambahPenjualan($tanggal, $barang_id, $pelanggan_id, $jumlah);
            ?>
            <div class="alert alert-success mt-3">
                Penjualan berhasil ditambahkan!
            </div>
        <?php endif; ?>

        <!-- Laporan Penjualan -->
        <div class="card mt-5">
            <div class="card-header">
                Laporan Penjualan
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="laporanTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="harian-tab" data-toggle="tab" href="#harian" role="tab" aria-controls="harian" aria-selected="true">Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mingguan-tab" data-toggle="tab" href="#mingguan" role="tab" aria-controls="mingguan" aria-selected="false">Mingguan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bulanan-tab" data-toggle="tab" href="#bulanan" role="tab" aria-controls="bulanan" aria-selected="false">Bulanan</a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="laporanTabContent">
                    <!-- Laporan Harian -->
                    <div class="tab-pane fade show active" id="harian" role="tabpanel" aria-labelledby="harian-tab">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="tanggal-harian">Tanggal</label>
                                <input type="date" name="tanggal-harian" id="tanggal-harian" class="form-control" required>
                            </div>
                            <button type="submit" name="submit-harian" class="btn btn-primary">Tampilkan</button>
                        </form>
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-harian'])) : ?>
                            <?php
                            $tanggal_harian = $_POST['tanggal-harian'];
                            $laporan_harian = getLaporanPenjualanHarian($tanggal_harian);
                            ?>
                            <?php if (count($laporan_harian) > 0) : ?>
                                <h5 class="mt-3">Laporan Penjualan Harian (<?php echo $tanggal_harian; ?>)</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($laporan_harian as $laporan) : ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $laporan['nama_barang']; ?></td>
                                                <td><?php echo $laporan['jumlah']; ?></td>
                                                <td><?php echo $laporan['harga']; ?></td>
                                                <td><?php echo $laporan['jumlah'] * $laporan['harga']; ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="alert alert-info mt-3">
                                    Tidak ada data penjualan untuk tanggal <?php echo $tanggal_harian; ?>.
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Laporan Mingguan -->
                    <div class="tab-pane fade" id="mingguan" role="tabpanel" aria-labelledby="mingguan-tab">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="tanggal-awal">Tanggal Awal</label>
                                <input type="date" name="tanggal-awal" id="tanggal-awal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-akhir">Tanggal Akhir</label>
                                <input type="date" name="tanggal-akhir" id="tanggal-akhir" class="form-control" required>
                            </div>
                            <button type="submit" name="submit-mingguan" class="btn btn-primary">Tampilkan</button>
                        </form>
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-mingguan'])) : ?>
                            <?php
                            $tanggal_awal = $_POST['tanggal-awal'];
                            $tanggal_akhir = $_POST['tanggal-akhir'];
                            $laporan_mingguan = getLaporanPenjualanMingguan($tanggal_awal, $tanggal_akhir);
                            ?>
                            <?php if (count($laporan_mingguan) > 0) : ?>
                                <h5 class="mt-3">Laporan Penjualan Mingguan (<?php echo $tanggal_awal; ?> - <?php echo $tanggal_akhir; ?>)</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Total Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($laporan_mingguan as $laporan) : ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $laporan['nama_barang']; ?></td>
                                                <td><?php echo $laporan['total_jumlah']; ?></td>
                                                <td><?php echo $laporan['harga']; ?></td>
                                                <td><?php echo $laporan['total_jumlah'] * $laporan['harga']; ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="alert alert-info mt-3">
                                    Tidak ada data penjualan untuk rentang tanggal <?php echo $tanggal_awal; ?> - <?php echo $tanggal_akhir; ?>.
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Laporan Bulanan -->
                    <div class="tab-pane fade" id="bulanan" role="tabpanel" aria-labelledby="bulanan-tab">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select name="bulan" id="bulan" class="form-control" required>
                                    <option value="">-- Pilih Bulan --</option>
                                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="number" name="tahun" id="tahun" class="form-control" required>
                            </div>
                            <button type="submit" name="submit-bulanan" class="btn btn-primary">Tampilkan</button>
                        </form>
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-bulanan'])) : ?>
                            <?php
                            $bulan = $_POST['bulan'];
                            $tahun = $_POST['tahun'];
                            $laporan_bulanan = getLaporanPenjualanBulanan($bulan, $tahun);
                            ?>
                            <?php if (count($laporan_bulanan) > 0) : ?>
                                <h5 class="mt-3">Laporan Penjualan Bulanan (<?php echo $bulan; ?>/<?php echo $tahun; ?>)</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Total Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($laporan_bulanan as $laporan) : ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $laporan['nama_barang']; ?></td>
                                                <td><?php echo $laporan['total_jumlah']; ?></td>
                                                <td><?php echo $laporan['harga']; ?></td>
                                                <td><?php echo $laporan['total_jumlah'] * $laporan['harga']; ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="alert alert-info mt-3">
                                    Tidak ada data penjualan untuk bulan <?php echo $bulan; ?>/<?php echo $tahun; ?>.
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Masukkan link JS dari framework Bootstrap di sini -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
