<?php
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_feby");

// ambil id dari URL
$id = $_GET['id'];

// ambil data lama
$data = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$id'");
$row = mysqli_fetch_assoc($data);

// proses update
if (isset($_POST['update'])) {
    $kategori = $_POST['kategori'];

    $update = mysqli_query($koneksi, 
        "UPDATE kategori SET ket_kategori='$kategori' WHERE id_kategori='$id'"
    );

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location='data-kategori.php';</script>";
    } else {
        echo "<script>alert('Gagal update');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>

<h2>Edit Kategori</h2>

<form method="POST">
    <input type="text" name="kategori" value="<?= $row['ket_kategori'] ?>" required>
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>