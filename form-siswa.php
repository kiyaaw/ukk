<?php
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_kiyaa");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['nis'])) {

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $password = $_POST['pass'];

    $insert = mysqli_query($koneksi,
        "INSERT INTO user (nis, username, kelas, password, role)
         VALUES ('$nis', '$nama', '$kelas', '$password', 'siswa')"
    );

    if ($insert) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    HALAMAN TAMBAH DATA SISWA
    <form action="data-siswa.php" method="POST">
      <div>
        <label for=""> NIS :</label> <br>
        <input type="text" name= "nis"/>
      </div>
      <div>
      <label for=""> Nama : </label> <br>
        <input type="text" name= "nama"/>
      </div>
      <div>
      <label for=""> Kelas : </label> <br>
        <textarea name="kelas"></textarea>
      </div>

      <label for=""> password : </label> <br>
        <input name="pass"></input>
      </div>
      <button type="submit" >KIRIM</button>
    </form>
</body>
</html>