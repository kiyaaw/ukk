<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_feby");

if(!isset($_SESSION['nis'])){
    echo "<script>alert('Harus login dulu!'); window.location='login.php';</script>";
    exit;
}
if(isset($_POST['ganti'])){
    $nis = $_SESSION['nis'];

    $pass_lama = trim($_POST['password_lama']);
    $pass_baru = trim($_POST['password_baru']);
    $konfirmasi = trim($_POST['konfirmasi_password']);
    $query = mysqli_query($koneksi, "SELECT password FROM user WHERE nis='$nis'");
    $data = mysqli_fetch_assoc($query);

    // cek password lama
    if(password_verify($pass_lama, $data['password'])){

        // cek konfirmasi password
        if($pass_baru === $konfirmasi){

            $hash_baru = password_hash($pass_baru, PASSWORD_DEFAULT);

            $update = mysqli_query($koneksi, "UPDATE user SET password='$hash_baru' WHERE nis='$nis'");

            if($update){
                echo "<script>alert('Password berhasil diganti!'); window.location='login.php';</script>";
            } else {
                echo "<script>alert('Gagal update password!'); window.history.back();</script>";
            }

        } else {
            echo "<script>alert('Konfirmasi password tidak cocok!'); window.history.back();</script>";
        }

    } else {
        echo "<script>alert('Password lama salah!'); window.history.back();</script>";
    }
}
?>
