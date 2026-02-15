<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_feby");

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$username'");
$data = mysqli_fetch_array($query);

if ($data) {
    if(password_verify($password, $data["password"])) {

        $_SESSION['nama'] = $data['nama'];
        $_SESSION['nis'] = $data['nis']; 

        if ($data['role'] == "admin") {
            header("Location: admin/halaman-admin.php");
            exit;
        } else if ($data['role'] == "siswa") {
            header("Location: dashboard-siswa.php");
            exit;
        }

    } else {
        echo "Password salah";
    }
} else {
    echo "Username tidak ditemukan";
}
?>
