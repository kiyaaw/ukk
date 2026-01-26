<?php include "koneksi.php";?> <!-- mengincludekan file koneksi.php !-->

<?php
$kategori=$_POST['kategori']; //menampung value dari combobox kategori
$cari=$_POST['textcari']; // menampung value dari textcari
if (!empty($kategori) or !empty($cari)) { // jika $kategori tidak kosong or $cari tidak kosong maka akan dilakukan di redirect ke halaman ?kategori='nilai dari $kategori'&cari='nilai dari $cari'
	header ("location: ?kategori=".$kategori."&cari=".$cari);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorial Koding</title>
</head>
<body>
<table width="700" cellpadding="0" cellspacing="0" align="center">
<tr>
<td height="34" colspan="5" align="center"><strong><h2>Daftar Data Siswa</h2></strong></td>
</tr>
<form method="post" action="">
<tr>
<td height="32" colspan="5">Pencarian Data Siswa &nbsp;
  <select name="kategori">
    <option value="nis">NIS</option>
    <option value="nama">Nama</option>
    <option value="alamat">Alamat</option>
    <option value="kelamin">Jenis Kelamin</option> &nbsp; 
  </select>  <input type="text" name="textcari" /> &nbsp; <input type="submit" name="cari" value="Cari" /></td>
</tr>
</form>
<tr>
<td width="69">No.</td>
<td width="119">NIS</td>
<td width="246">Nama</td>
<td width="141">Alamat</td>
<td width="123">Jenis Kelamin</td>
</tr>
<tr>
<?php
$kategori=$_GET['kategori']; //mendapatkan nilai kategori
$cari=$_GET['cari']; // mendapatkan nilai cari
if (empty($kategori) and empty($cari)) { //jika $kategori dan $cari kosong
	$sqlsiswa=mysql_query("select * from siswa"); // sql untuk menampilkan seluruh data siswa
} else { 
	$sqlsiswa=mysql_query("select * from siswa where ".$kategori." like '%".$cari."%'"); //sql untuk menampilkan hasil pencarian data siswa
	}
while ($datasiswa=mysql_fetch_array($sqlsiswa)) {$a++; // perulangan untuk menampilkan data siswa
?>
<td><?=$a; // nomor urut?></td>
<td><?=$datasiswa['nis']; // menampilkan data nis?></td>
<td><?=$datasiswa['nama']; // menampilkan data nama?></td>
<td><?=$datasiswa['alamat']; // menampilkan data alamat?></td>
<td><?=$datasiswa['kelamin']; //menampilkan data kelamin?></td>
</tr>
<?php } ?>
</table>
</body>
</html>
