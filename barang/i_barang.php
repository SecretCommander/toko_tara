<?php
include 'koneksi.php';
include 'function.php';
input_data();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <p>
            <label for="">Nama Produk:</label>
            <input required type="text" name="np">
        </p>
        <p>
            <label for="">Stok Produk:</label>
            <input required type="number" name="Jlh" id="">
        </p>
        <p>
            <label for="">Vidio Produk:</label>
            <input required type="file" id=""  name="vidi"  accept="video/*">
        </p>
        <p>
            <label for="">Foto Produk:</label>
            <input required type="file" id=""  name="foto"  accept="image/*">
        </p>
        <p>
            <label for="">Foto Produk2:</label>
            <input required type="file"  id="" name="foto1"  accept="image/*">
        </p>
        <p>
            <label for="">Foto Produk3:</label>
            <input required type="file"  id="" name="foto2"  accept="image/*">
        </p>
        <p> <label for="kat">Pilih Kategori:</label>
            <select required id="kat" name="kate">
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Pakaian">Pakaian</option>
                <option value="Bubuk">Bubuk</option>
            </select>
        </p>
        <p> <label for="hp">Harga Produk:</label>
            <input required type="text" name="harga" id="">
        </p>
        <p> <label for="berat">Berat:</label>
            <input required type="number" name="berat" id="">
        </p>
        <label for="ds">Deskripsi:</label>
        <p> <textarea required name="deskripsi" rows="15" cols="30"></textarea></p>
        <p> <input type="submit" value="Submit"></p>
    </form>
</body>

</html>