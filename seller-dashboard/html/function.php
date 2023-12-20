<?php

require 'koneksi.php';
//Proses Input Vidio
function uvid($vidio)
{
    if(!isset($vidio['name']) || empty($vidio['name'])){
        return;
    }
    if (isset($vidio['name'])) {
        $sizevid = $vidio['size'];
        $split = explode('.', $vidio['name']);
        $ext = $split[count($split) - 1];
        if ($sizevid > 50000000){
            echo "<script>
            alert('Size Terlalu Gede!');
            </script>";
            return false;
        }
    
        $vid = uniqid() . "." . $ext;

        $dir = "video/";
        $tmpfile = $vidio['tmp_name'];

        move_uploaded_file($tmpfile, $dir . $vid);
        return $vid;
    } else {
        return null;
    }
}
//Proses Input Gambar 
function upload($gambar,$input)
{
    if(!isset($gambar['name']) || empty($gambar['name'])){
        return;
    }
    if (isset($gambar['name'])) {
        $error = $gambar['error'];
        $split = explode('.', $gambar['name']);
        $ext = $split[count($split) - 1];

        $fot = uniqid() . "." . $ext;
        if ($input == 'foto') {
            if($error === 4){
                echo "<script>
                alert('pilih gambar terlebih dahulu');
                </script>";
                return false;
            }    
        } 
        

        $dir = "imgbarang/";

        

        $tmpfile = $gambar['tmp_name'];

        move_uploaded_file($tmpfile, $dir . $fot);
        return $fot;
    } else {
        return null;
    }
}
//Input Barang Toko
function input_data()
{
    if (!isset($_SESSION['penjual_id']) || empty($_SESSION['penjual_id'])) {
        echo "<script>alert('Login Terlebih Dahulu'); window.location.href='../penjual/login.php';</script>";
        die();
    }

    $id_penjual = $_SESSION['penjual_id'];
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_produk = htmlspecialchars($_POST['np']);
        $Stok_produk = $_POST['jlh'];
        $berat = $_POST['berat'];
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $tinggi = $_POST['tinggi'];
        $sku  = "SKU-".$_POST['sku'];
        function belahkah(){
            if (isset($_POST['belah']) && !empty($_POST['belah'])){
                return true;
            } else {
                return false;
            }
        }
        $belah = belahkah();

        $vidioo = uvid($_FILES['vidi']);
        $foto_produk = upload($_FILES['foto'], "foto");
        $foto2 = upload($_FILES['foto1'], "foto1");
        $foto3 = upload($_FILES['foto2'],"foto1");

        $kategori = $_POST['kate'];
        $harga = $_POST['harga'];
        $berat = $_POST['berat'];
        $deskripsi = htmlspecialchars($_POST['deskripsi']);


        // Perform the SQL query to insert the data into the database
        $sql = "INSERT INTO barang (nama_produk, jumlah_produk, foto_produk, kategori_produk, harga_produk, berat, deskripsi_produk, id_toko, vid, foto2, foto3,  panjang, lebar, tinggi, belah, SKU) 
            VALUES ('$nama_produk', '$Stok_produk', '$foto_produk', '$kategori', '$harga', '$berat', '$deskripsi', '$id_penjual', '$vidioo','$foto2', '$foto3','$panjang','$lebar','$tinggi', '$belah', '$sku')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Data berhasil dimasukkan'); window.location.href='list-produk.php';</script>";
            mysqli_close($conn);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
//Menampilkan Data Barang
function detail_data($var_id)
{
    global $conn;
    global $result;
    $sql = "SELECT *FROM barang WHERE id_produk=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $var_id;
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                return true; //jika ada data nilai true
            } else {
                return false; //jika data tidak ditemukan nilai false
            }
        } else {
            echo "Terjadi kesalahan";
        }
    }
    mysqli_stmt_close($stmt);
}

//Delete Barang
function delete_item($var_id)
{
    $idf = $_GET["id"];
    global $conn;

    $queryShow = "SELECT * FROM barang where id_produk = '$idf';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("img/" . $result['foto_produk']);

    $sql = "DELETE FROM barang WHERE id_produk = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $var_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Item deleted successfully'); window.location.href='list-barang.php';</script>";
        } else {
            echo "Error deleting item";
        }

        mysqli_stmt_close($stmt);
    }
}
//Update Data
function update_data()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // menyimpan data kedalam variabel
        $id = $_POST['id_produk'];
        $nama_produk = htmlspecialchars($_POST['nama_produk']);
        $Stok_produk = $_POST['Stok_produk'];
        $kategori_produk = htmlspecialchars($_POST['kategori_produk']);
        $harga_produk = $_POST['harga_produk'];
        $berat = $_POST['berat'];
        $deskripsi_produk = htmlspecialchars($_POST['deskripsi_produk']);

        $queryShow = "SELECT * FROM barang WHERE id_produk = '$id';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if ($_FILES["foto_produk"]["name"] == "") {
            $foto = $result["foto_produk"];
        } else {
            $split = explode('.', $_FILES['foto_produk']['name']);
            $ext = $split[count($split) - 1];

            $foto = uniqid() . "." . $ext;
            unlink("img/" . $result['foto_produk']);
            move_uploaded_file($_FILES["foto_produk"]["tmp_name"], "img/" . $foto);
        }

        // query SQL untuk insert data ke dalam Mysql
        $sql = "UPDATE barang SET nama_produk='$nama_produk', jumlah_produk='$Stok_produk', kategori_produk='$kategori_produk',
foto_produk='$foto', harga_produk='$harga_produk', berat='$berat', deskripsi_produk='$deskripsi_produk' where id_produk='$id'";
        mysqli_query($conn, $sql);
        // mengalihkan ke halaman index.php
        echo "<script>alert('Data yang anda Update sukses');window.location='tampil_barang.php'</script>";
    }
}
//Menampilkan Semua Barang
function tampil_data()
{
    global $conn;
    $sql = "SELECT * FROM barang";
    $result = mysqli_query($conn, $sql);
    return $result;
}
//Function Barang sesuai Toko
function tampil_barangtoko($idtoko)
{
    global $conn;
    $sql = "SELECT * FROM barang WHERE id_toko= '$idtoko'";//id toko
    $result = mysqli_query($conn, $sql);
    return $result;
}
//Function Search
function searching($keyword)
{
    global $conn;
    $sql = "SELECT * FROM barang where nama_produk LIKE '%$keyword%' ";
    $result = mysqli_query($conn, $sql);
    return $result;
}