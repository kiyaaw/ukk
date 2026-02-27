<?php
session_start();
include 'config/auth.php';

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
    <form action="proses-tambah-siswa.php" method="POST">
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
        <select name="kelas" id="">
          <option value="12 RPL 1"> 12 RPL 1 </option>
          <option value="12 RPL 2"> 12 RPL 2 </option>
        </select>
      </div>

      <label for=""> password : </label> <br>
        <input name="pass"></input>
      </div>
      <button type="submit" name="simpan" >KIRIM</button>
    </form>
</body>
</html>
