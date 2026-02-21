<?php
$koneksi = mysqli_connect("localhost", "root", "", "ujikom_12rpl2_feby");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// DELETE
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");

    if ($delete) {
        echo "<script>alert('Data berhasil dihapus'); window.location='data-kategori.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}

// INSERT
if (isset($_POST['kategori']) && trim($_POST['kategori']) != "") {
    $kategori = trim($_POST['kategori']);

    mysqli_query($koneksi, "INSERT INTO kategori (ket_kategori) VALUES ('$kategori')");

    header("Location: data-kategori.php");
    exit;
}

// SELECT
$query = mysqli_query($koneksi, "SELECT * FROM kategori");
$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
</head>
<body>

<h2>List Kategori</h2>

<!-- FORM TAMBAH -->
<form method="POST">
    <input type="text" name="kategori" placeholder="Tambah kategori" required>
    <button type="submit">Tambah</button>
</form>

<br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>ID</th>
    <th>Kategori</th>
    <th>Aksi</th>
</tr>

<?php while ($data = mysqli_fetch_assoc($query)) { ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $data['id_kategori'] ?></td>
    <td><?= $data['ket_kategori'] ?></td>
    <td>
        <!-- EDIT -->
        <a href="edit-kategori.php?id=<?= $data['id_kategori'] ?>">
            <button >Edit</button>
        </a>

        <!-- DELETE -->
        <a href="?hapus=<?= $data['id_kategori'] ?>" 
        onclick="return confirm('Yakin hapus?')">
            <button>Hapus</button>
        </a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>