<?php

$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_kiyaa");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// cek id dari url
if (!isset($_GET['id'])) {
    echo "Id pengaduan tidak ditemukan";
    exit;
}

$id = $_GET['id'];
echo "id nya: " . $id;


// update data
if (isset($_POST['simpan'])) {
    $status = $_POST['status'];
    $feedback = $_POST['feedback'];

    $update = mysqli_query($koneksi, "UPDATE `input-aspirasi` 
        SET status='$status', feedback='$feedback' 
        WHERE `id-pelaporan`='$id'");

    if ($update) {
        header("Location: data-pengaduan.php");
        exit;
    } else {
        echo "Gagal update data";
    }
}

// ambil data
$query = mysqli_query($koneksi, "SELECT `input-aspirasi`.*, kategori.`ket-kategori`
FROM `input-aspirasi`
LEFT JOIN kategori 
ON `input-aspirasi`.`kategori` = `kategori`.`ket-kategori`
WHERE `input-aspirasi`.`id-pelaporan` = '$id'");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data pengaduan tidak ditemukan";
    exit;
}
?>
