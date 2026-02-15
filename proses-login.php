<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_kiyaa");

$username = $_POST ['username'];
$password = $_POST ['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

$data = mysqli_fetch_array($query);

if ($data){
    if (password_verify($password, $data ["password"])) {
        $_SESSION['nama'] = $data['username'];
        $_SESSION['role'] = $data['role'];
    
    if ($data ['role'] == 'admin') {
        header ("Location: admin/dashboard-admin.php");

    } else if ($data ['role'] == 'siswa') {
        header ("Location: dashboard.php");
    } else {
        echo "password salah";
    }
    }
} 
?>