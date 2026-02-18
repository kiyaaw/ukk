<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Data Pengaduan </h2>

<table border="1" cellpadding="10" cellspacing="0"> 
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Detail</th>
    </tr>
<?php
$koneksi = mysqli_connect ("localhost", "root", "", "ujikom_12rpl2_kiyaa");
$no = 1;

$query = mysqli_query($koneksi, "SELECT * FROM `input-aspirasi`");

while ($data = mysqli_fetch_assoc($query)) {
?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['tanggal'] ?></td>
        <td><?= $data['kategori'] ?></td>
        <td><?= $data['lokasi'] ?></td>
        <td><?= $data['ket'] ?></td>
        <td><?= $data['status'] ?></td>
        <td>
            <a href="detail-pengaduan.php?id=<?= $data['id-pelaporan'] ?>">
                <button>Detail</button>
            </a>
        </td>
    </tr>
<?php } ?>
</table>
</body>
</html>