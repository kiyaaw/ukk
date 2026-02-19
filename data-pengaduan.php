<?php
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_feby");

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}

// =====================
// DELETE
// =====================
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $delete = mysqli_query($koneksi, "DELETE FROM `input-asprirasi` WHERE id_pelaporan = '$id'");

    if ($delete) {
        echo "<script>alert('Data berhasil dihapus'); window.location='list-aspirasi.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}

// =====================
// AMBIL FILTER
// =====================
$tanggal = $_GET['tanggal'] ?? "";
$nis = $_GET['nis'] ?? "";
$kategori = $_GET['kategori'] ?? "";
$status = $_GET['status'] ?? "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengaduan</title>
</head>
<body>

<h2>Data Pengaduan</h2>

<!-- ===================== -->
<!-- FORM SEARCH -->
<!-- ===================== -->
<form method="GET">
    Tanggal: 
    <input type="date" name="tanggal" value="<?= $tanggal ?>">

    NIS: 
    <input type="text" name="nis" value="<?= $nis ?>">

    Kategori:
    <input type="text" name="kategori" value="<?= $kategori ?>">

    Status:
    <select name="status">
        <option value=""> </option>
        <option value="proses" <?= ($status=="proses")?"selected":"" ?>>Proses</option>
        <option value="selesai" <?= ($status=="selesai")?"selected":"" ?>>Selesai</option>
    </select>

    <button type="submit">Cari</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Detail</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;

// =====================
// QUERY DASAR
// =====================
$sql = "
    SELECT `input-asprirasi`.*, user.nis 
    FROM `input-asprirasi`
    JOIN user ON `input-asprirasi`.nis = user.nis
    WHERE 1=1
";

// =====================
// TAMBAH FILTER
// =====================
if($tanggal != ""){
    $sql .= " AND tanggal = '$tanggal'";
}

if($nis != ""){
    $sql .= " AND `input-asprirasi`.nis LIKE '%$nis%'";
}

if($kategori != ""){
    $sql .= " AND kategori LIKE '%$kategori%'";
}

if($status != ""){
    $sql .= " AND status = '$status'";
}

// =====================
// EKSEKUSI QUERY
// =====================
$query = mysqli_query($koneksi, $sql);

if(!$query){
    die("Query error: " . mysqli_error($koneksi));
}

while ($data = mysqli_fetch_assoc($query)) {
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $data['nis'] ?></td>
    <td><?= $data['tanggal'] ?></td>
    <td><?= $data['kategori'] ?></td>
    <td><?= $data['lokasi'] ?></td>
    <td><?= $data['ket'] ?></td>
    <td><?= $data['status'] ?></td>

    <td>
        <a href="tampilan-detail.php?id=<?= $data['id_pelaporan'] ?>">
            <button>Detail</button>
        </a>
    </td>

    <td>
        <a href="detail-pengaduan.php?id=<?= $data['id_pelaporan'] ?>">
            <button>Edit</button>
        </a>

        <a href="?hapus=<?= $data['id_pelaporan'] ?>" 
           onclick="return confirm('Yakin mau hapus data ini?')">
            <button>Hapus</button>
        </a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>
