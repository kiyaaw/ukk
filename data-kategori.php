<?php
// koneksi
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_kiyaa");

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// proses insert kalau ada POST
if (isset($_POST['kategori']) && trim($_POST['kategori']) != "") {
    $kategori = trim($_POST['kategori']);
    mysqli_query($koneksi, "INSERT INTO `kategori`(`ket-kategori`) VALUES ('$kategori')");

    // supaya tidak dobel insert saat refresh
    header("Location: data-kategori.php");
    exit;
}

// ambil semua data kategori
$query = mysqli_query($koneksi, "SELECT * FROM `kategori`");
$no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Kategori</title>
</head>
<body>

<h2>List Kategori</h2>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>No</th>
    <th>Id Kategori</th>
    <th>Kategori</th>
</tr>

<?php while ($data = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $data['id-kategori'] ?></td>
    <td><?= $data['ket-kategori'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>