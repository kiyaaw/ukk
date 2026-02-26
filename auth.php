<?php
// pastikan session sudah dimulai
if (session_status() === PHP_SESSION_NONE ) {
    session_start();
}

// cek user udah login atau belum
if (!isset($_SESSION['id'])) {
    // jika tidak ada, balik ke halaman pertama
    header("Location:../index.php?pesan=belum_login");
    exit;
}