<?php
include "config/auth.php";

$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_kiyaa");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// cek nis dari url
if (!isset($_GET['nis'])) {
    echo "NIS tidak ditemukan";
    exit;
}

$nis_lama = $_GET['nis'];

// ambil data berdasarkan NIS
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE nis = '$nis_lama'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data siswa tidak ditemukan";
    exit;
}

// proses update
if (isset($_POST['simpan'])) {

    $nis_baru = $_POST['nis'];
    $username = $_POST['username'];
    $kelas = $_POST['kelas'];

    $update = mysqli_query($koneksi, "UPDATE user SET
        nis = '$nis_baru',
        username = '$username',
        kelas = '$kelas'
        WHERE nis = '$nis_lama'
    ");

    if ($update) {
        header("Location: data-siswa.php");
        exit;
    } else {
        echo "Gagal update data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
</head>
<body>

<h2>Edit Data Siswa</h2>

<form method="POST">
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <td><b>NIS</b></td>
            <td>
                <input type="text" name="nis" value="<?= $data['nis']; ?>" required>
            </td>
        </tr>

        <tr>
            <td><b>Username</b></td>
            <td>
                <input type="text" name="username" value="<?= $data['username']; ?>" required>
            </td>
        </tr>

        <tr>
            <td><b>Kelas</b></td>
            <td>
                <input type="text" name="kelas" value="<?= $data['kelas']; ?>" required>
            </td>
        </tr>

    </table>

    <br>
    <button type="submit" name="simpan">Simpan Perubahan</button>
    <a href="data-siswa.php">Kembali</a>

</form>

</body>
</html>
