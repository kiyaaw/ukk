<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Ganti Password</h2>

    <form action= "proses-ganti-password.php" method="POST">
        <label> Password Lama</label> <br>
        <input type+"password" name="password_lama" required><br>

        <label>Password Baru</label> <br>
        <input type= "password" name= "password_baru" required><br><br>

        <label>Konfirmasi Password Baru</label> <br>
        <input type= "password" name= "konfirmasi_password" required><br><br>

        <button type="submit" name="ganti"> Simpan Password Baru</button>
    </form>

        
</body>
</html>