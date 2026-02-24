<?php
// koneksi
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_kiyaa");

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// delete data siswa
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE nis = '$id'");

    if ($delete) {
        echo "<script>alert('Data berhasil dihapus'); window.location='data-siswa.php';</script>";
        exit;
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}

// proses insert kalau ada POST
if (isset($_POST['user']) && trim($_POST['user']) != "") {
    $kategori = trim($_POST['user']);
    mysqli_query($koneksi, "INSERT INTO `user`(`usename`) VALUES ('$username')");

    // supaya tidak dobel insert saat refresh
    header("Location: data-siswa.php");
    exit;
}

// ambil semua data kategori
$query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE role='siswa'");
$no = 1;

// ambil filter
$nis = $_GET['nis'] ?? "";

// query dasar
$sql = "SELECT * FROM `user` WHERE role='siswa'";

// kalau ada isi pencarian
if ($nis != "") {
    $sql .= " AND nis LIKE '%$nis%'";
}

// jalankan query
$query = mysqli_query($koneksi, $sql);
$no = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
</head>
<body>

<h2>Data Siswa </h2>
<form method="GET">
    NIS: 
    <input type="text" name="nis" value="<?= $nis ?>">

    <button type="submit">Cari</button>
</form>
<br>
<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>No</th>
    <th>Id Siswa</th>
    <th>NIS</th>
    <th>Username</th>
    <th>Role</th>
    <th>Kelas</th>
    <th>Password</th>
    <th>Aksi</th>
</tr>

<?php while ($data = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $data['id'] ?></td>
    <td><?= $data['nis'] ?></td>
    <td><?= $data['username'] ?></td>
    <td><?= $data['role'] ?></td>
    <td><?= $data['kelas'] ?></td>
    <td><?= $data['password'] ?></td>
    <td>
        <a href="edit-data-siswa.php?nis=<?= $data['nis'] ?>">
            <button>Edit</button>
        </a>
        <a href="?hapus=<?= $data['nis'] ?>" onclick="return confirm('Yakin mau hapus data ini?')">
            <button>Hapus</button>
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>