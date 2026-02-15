<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pengaduan Sarana dan Prasarana MUTU</title>
</head>
<style>
    .box {
       display: flex;
       justify-content: center;
       height: 450px;
       justify-content: center;
       align-items: center;
       height: 100vh;
    }
    .kotak {
        background-color: white;
        border-radius: 10px;
        box-shadow: 4px 4px 5px rgb(184, 183, 183);
        color: rgb(128, 164, 243);   
        padding-right: 20px;
        padding-left: 15px;
        padding-top: 20px;
        padding-bottom: 40px;
        margin: none;
    }
    input, input, select {
        height: 30px;
        width: 450px;
        border-radius: 5px;
    }
    .tombol {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 10px;
        height: 25px;
    }
    button {
        border-radius: 5px;
    }
</style>
<body style="background-color: rgb(219, 238, 255); margin: 0;" >
<form action="proses-pengaduan.php" method = "POST"> 
    <div class="box" >
        <div class="kotak" >
            <h2 style= "text-align: center;" >HALAMAN FORM PENGADUAN</h2>
            <div>
                <label for="">NIS</label> <br />
                <input type="text" name= "nis" />
            </div>
            <div>
                <label for=""> Tanggal </label> <br />
                <input type="date" name="tanggal" > 
            </div>
            <div>
                <label for="pilihan">Kategori</label> <br />
                <select name="pilihan" id="pilihan">
                    <option value="fasilitas-kelas"> Fasilitas Kelas </option>
                    <option value="lingkungan"> Lingkungan </option>
                    <option value="sanitasi"> Sanitasi </option>
                    <option value="lainnya"> Lainnya </option>
                </select>
            </div>

            <div>
                <label for="">Lokasi</label> <br />
                <input type="text" name = "lokasi"/>
            </div>

            <div>
                <label for="">Keterangan</label> <br />
                <textarea name= "ket" style=" border-radius: 5px; height: 100px; width: 450px;"></textarea>
            </div>

            <div class="tombol">
                <button style= "background-color: rgb(135, 206, 250)"> KIRIM</button>
                <button style= "background-color: rgba(255, 86, 86, 1)"> BATAL</button>
            </div>
        </div>
    </div>
</body>
</html>

