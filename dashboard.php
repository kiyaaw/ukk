<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$nis = $_SESSION['nis'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Siswa - Pengaduan MUTU</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", sans-serif;
    text-decoration:none;
}

body{
    background:#f4f7fb;
    min-height:100vh;
}

/* NAVBAR */
.navbar{
    background: linear-gradient(120deg, #1f566e, #447383, #6895a8);
    color:white;
    padding:20px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    font-size:20px;
    font-weight:600;
    letter-spacing:1px;
}

.nav-right{
    display:flex;
    align-items:center;
    gap:25px;
}

.user-badge{
    background:rgba(255,255,255,0.15);
    padding:8px 18px;
    border-radius:25px;
    font-size:14px;
}

.logout-btn{
    background:white;
    color: #1e3c72;
    border:none;
    padding:8px 20px;
    border-radius:25px;
    font-size:13px;
    cursor:pointer;
    transition:0.3s;
}

.logout-btn:hover{
    background: #dcdcdc;
}

/* DASHBOARD SECTION */
.container{
    padding:60px;
}

.header{
    margin-bottom:40px;
}

.header h1{
    color: #408ab6;
    font-size:28px;
}

.cards{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap:25px;
}

.card{
    background:white;
    padding:35px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s ease;
}

.card:hover{
    transform:translateY(-6px);
}

.card h3{
    margin-bottom:15px;
    color: #408ab6;
}

.card p{
    font-size:14px;
    color:#555;
    margin-bottom:20px;
}

.card button{
    background: #408ab6;
    border:none;
    padding:10px 20px;
    border-radius:8px;
    color:white;
    cursor:pointer;
    font-size:13px;
    transition:0.3s;
}

.card button:hover{
    background: #316b8d;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
        Sistem Pengaduan MUTU
    </div>

    <div class="nav-right">
        <div class="user-badge">
            <?= $username; ?> | <?= $nis; ?>
        </div>

        <a href="proses_logout.php">
            <button class="logout-btn">Logout</button>
        </a>
    </div>
</div>

<!-- DASHBOARD -->
<div class="container">
    
    <div class="header">
        <h1>Dashboard Siswa</h1>
    </div>

    <div class="cards">
        
        <div class="card">
            <h3>Input Aspirasi</h3>
            <p>Kirim laporan atau pengaduan terkait sarana dan prasarana sekolah.</p>
            <a href="form-pengaduan.php">
                <button>Buka Form</button>
            </a>
        </div>

        <div class="card">
            <h3>Data Aspirasi</h3>
            <p>Lihat daftar aspirasi yang sudah Anda kirim dan statusnya.</p>
            <a href="list-aspirasi.php">
                <button>Lihat Data</button>
            </a>
        </div>

        <div class="card">
            <h3>Ganti Password</h3>
            <p>Perbarui password akun Anda untuk menjaga keamanan.</p>
            <a href="password.php">
                <button>Ubah Password</button>
            </a>
        </div>

    </div>

</div>

</body>
</html>