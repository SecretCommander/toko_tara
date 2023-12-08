<?php
session_start();
require 'koneksi.php';

//Login
function login($conn, $nama_toko, $password)
{
    $sql = "SELECT * FROM penjual WHERE nama_toko='$nama_toko' and password='$password'";
    $result = mysqli_query($conn, $sql);
    //Session id penjual
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["penjual_id"] = $row["id_penjual"];
        return "<script>alert('Login successful'); window.location.href='../seller-dashboard/html/tambah-produk.php';</script>";
    } else {
        return "Login failed";
    }
}
function logen()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_toko = $_POST['nama_toko'];
        $password = $_POST['password'];

        $result = login($conn, $nama_toko, $password);
        echo $result;
    }
}

//Function Register SQL
function register($conn, $nama_toko, $nama_penjual, $password, $foto_toko, $telepon, $email, $provinsi, $kota, $alamat, $slogan, $deskripsi)
{
    $sql = "INSERT INTO penjual (nama_toko, nama_penjual, password, foto_toko, telepon, email, provinsi, kota, alamat, slogan, deskripsi, id_toko) 
    VALUES ('$nama_toko', '$nama_penjual', '$password', '$foto_toko', '$telepon', '$email', '$provinsi', '$kota', '$alamat', '$slogan', '$deskripsi')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
//Register Toko/Penjual
function registe()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_toko = htmlspecialchars($_POST['nama_toko']);
        $nama_penjual = htmlspecialchars($_POST['nama_penjual']);
        $password = htmlspecialchars($_POST['password']);

        $split = explode('.', $_FILES['foto_toko']['name']);
        $ext = $split[count($split) - 1];

        $foto_toko = uniqid() . "." . $ext;

        $telepon = htmlspecialchars($_POST['telepon']);
        $email = htmlspecialchars($_POST['email']);
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $alamat = htmlspecialchars($_POST['alamat']);
        $slogan = htmlspecialchars($_POST['slogan']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);

        $dir = "img/";
        $tmpfile = $_FILES['foto_toko']['tmp_name'];

        move_uploaded_file($tmpfile, $dir . $foto_toko);

        if (register($conn, $nama_toko, $nama_penjual, $password, $foto_toko, $telepon, $email, $provinsi, $kota, $alamat, $slogan, $deskripsi)) {
            echo "<script>alert('Registration successful'); window.location.href='tampil_data.php';</script>";
        } else {
            echo "Registration failed <br>";
            echo "Nama Toko Mungkin sudah ada <br>";

        }
    }
}

//Tampil Data
function tampil_data()
{
    global $conn;
    $sql = "SELECT * FROM penjual";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//Detail Toko
function detail_data($var_id)
{
    global $conn;
    global $result;
    $sql = "SELECT *FROM penjual WHERE id_penjual=?";
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

//Update Toko
function update()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // menyimpan data kedalam variabel
        $id_penjual = $_POST['id_penjual'];
        $nama_toko = htmlspecialchars($_POST['nama_toko']);
        $nama_penjual = htmlspecialchars($_POST['nama_penjual']);
        $password = htmlspecialchars($_POST['password']);
        $telepon = htmlspecialchars($_POST['telepon']);
        $email = htmlspecialchars($_POST['email']);
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $alamat = htmlspecialchars($_POST['alamat']);
        $slogan = htmlspecialchars($_POST['slogan']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);

        $queryShow = "SELECT * FROM penjual WHERE id_penjual = '$id_penjual';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if ($_FILES["foto_toko"]["name"] == "") {
            $foto = $result["foto_toko"];
        } else {
            $split = explode('.', $_FILES['foto_toko']['name']);
            $ext = $split[count($split) - 1];


            $foto = uniqid() . "." . $ext;
            unlink("img/" . $result['foto_toko']);
            move_uploaded_file($_FILES["foto_toko"]["tmp_name"], "img/" . $foto);
        }

        // query SQL untuk insert data ke dalam Mysql
        $sql = "UPDATE penjual SET nama_toko='$nama_toko', nama_penjual='$nama_penjual', password='$password',
foto_toko='$foto', telepon='$telepon', email='$email' ,provinsi='$provinsi' ,kota='$kota', alamat='$alamat', 
slogan='$slogan' ,deskripsi='$deskripsi' where id_penjual='$id_penjual'";
        try {
            mysqli_query($conn, $sql);
            echo "<script>alert('Data yang anda Update sukses');window.location='tampil_data.php'</script>";
        }
        // mengalihkan ke halaman index.php
        catch (mysqli_sql_exception) {
            return "Update Failed";
        }
    }
}
?>