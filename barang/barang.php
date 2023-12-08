<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $nama_produk = $_POST['np'];
    $Stok_produk = $_POST['Jlh'];

    $split = explode('.', $_FILES['foto']['name']);
    $ext = $split[count($split)-1];

    $foto_produk = uniqid(). "." .$ext;
    
    $kategori = $_POST['kate'];
    $harga = $_POST['harga'];
    $berat = $_POST['berat'];
    $deskripsi = $_POST['deskripsi'];

    $dir = "img/";
    $tmpfile = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmpfile,$dir.$foto_produk);
    

    // Perform the SQL query to insert the data into the database
    $sql = "INSERT INTO barang (nama_produk, jumlah_produk, foto_produk, kategori_produk, harga_produk, berat, deskripsi_produk) 
            VALUES ('$nama_produk', '$Stok_produk', '$foto_produk', '$kategori', '$harga', '$berat', '$deskripsi')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>