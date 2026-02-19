<?php
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_kiyaa");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

/* =========================
   AMBIL DATA KATEGORI
   ========================= */
$kategori_query = mysqli_query($koneksi, "SELECT * FROM `kategori`");

/* =========================
   QUERY LAPORAN ASPIRASI
   ========================= */

$query_text = "SELECT * FROM `input-aspirasi`
               LEFT JOIN kategori 
               ON `input-aspirasi`.`kategori` = kategori.`ket-kategori`
               WHERE 1=1";

/* FILTER KATEGORI */
if (isset($_GET['kategori']) && $_GET['kategori'] != "") {
    $kat = $_GET['kategori'];
    $query_text .= " AND `input-aspirasi`.`kategori` = '$kat'";
}

/* FILTER NIS */
if (isset($_GET['nis']) && $_GET['nis'] != "") {
    $nis = $_GET['nis'];
    $query_text .= " AND `input-aspirasi`.`nis` = '$nis'";
}

$query = mysqli_query($koneksi, $query_text);
$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Aspirasi</title>
</head>
<body>

<h2>Laporan Aspirasi</h2>

<form method="GET">
    <label>Filter Kategori:</label>
    <select name="kategori">
        <option value="">--Semua Kategori--</option>

        <?php while ($kat = mysqli_fetch_assoc($kategori_query)) { ?>
            <option value="<?= $kat['id-kategori'] ?>"
                <?= (isset($_GET['kategori']) && $_GET['kategori'] == $kat['id-kategori']) ? 'selected' : '' ?>>
                <?= $kat['ket-kategori'] ?>
            </option>
        <?php } ?>
    </select>

    <label>Cari NIS:</label>
    <input type="text" name="nis" placeholder="Masukkan NIS"
        value="<?= isset($_GET['nis']) ? $_GET['nis'] : '' ?>">

    <button type="submit">Filter Data</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>NIS</th>
    <th>Kategori</th>
    <th>Lokasi</th>
    <th>Keterangan</th>
    <th>Status</th>
    <th>Detail</th>
</tr>

<?php while ($data = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $data['tanggal'] ?></td>
    <td><?= $data['nis'] ?></td>
    <td><?= $data['ket-kategori'] ?></td>
    <td><?= $data['lokasi'] ?></td>
    <td><?= $data['ket'] ?></td>
    <td><?= $data['status'] ?></td>
    <td>
        <a href="detail-pengaduan.php?id=<?= $data['id-pelaporan'] ?>">
            <button type="button">Detail</button>
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
