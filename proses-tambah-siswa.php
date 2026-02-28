<?php
session_start();
include 'config/auth.php';

$koneksi = mysqli_connect ("localhost", "root", "", "ujikom_12rpl2_kiyaa");

if (isset($_POST['simpan'])) {
    // ambil data dari form
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $raw_pass = $_POST['pass'];

    // enkripsi password
    $password_aman = password_hash($raw_pass, PASSWORD_DEFAULT);
    
    // query insert ke dalam tabel user
    $query = "INSERT INTO `user`(`id`, `username`, `password`, `role`, `nis`, `kelas`) 
            VALUES (NULL, '$nama', '$password_aman', 'siswa', '$nis', '$kelas')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan){
        echo "<script> alert('Data berhasil ditambahkan'); window.location='data-siswa.php'; </script>";
    } else {
        echo "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>