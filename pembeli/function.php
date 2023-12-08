<?php

session_start();
require 'koneksi.php';
//Registrasi SQL
function register($conn, $username, $nama_pembeli, $password, $telepon, $email, $alamat, $usia)
{
    $sql = "INSERT INTO pembeli (username, nama_pembeli, password , telepon, email, alamat, tgl_lahir) 
            VALUES ('$username', '$nama_pembeli','$password','$telepon','$email','$alamat','$usia')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

//Registrasi
function regist()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username     = htmlspecialchars($_POST['username']);
        $nama_pembeli = htmlspecialchars($_POST['nama_pembeli']);
        $password     = htmlspecialchars($_POST['password']);
        $telepon      = htmlspecialchars($_POST['telepon']);
        $email        = htmlspecialchars($_POST['email']);
        $alamat       = htmlspecialchars($_POST['alamat']);
        $usia         = $_POST['usia'];

        if (register($conn, $username, $nama_pembeli, $password, $telepon, $email, $alamat, $usia)) {
            echo "Registration successful";
        } else {
            echo "Registration failed";
        }
    }
}

//Tampil Data
function tampil_data()
{
    global $conn;
    $sql = "SELECT * FROM pembeli";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//Menampilkan Detail Suatu Data
function detail_data($var_id)
{
    global $conn;
    global $result;
    $sql = "SELECT *FROM pembeli WHERE id_pembeli=?";
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

//LOGIN Pembeli SQL
function login($conn, $username, $password)
{
    $sql = "SELECT * FROM pembeli WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
                 $_SESSION['id_pembeli'] = $row['id_pembeli'];
        }
        return "<script>alert('Login successful'); window.location.href='pe/html/index.php';</script>";
    } else {
        return "Login failed";
    }
}
//Login
function loginn()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = login($conn, $username, $password);
        echo $result;
    }
}

//Update
function update()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = htmlspecialchars($_POST['id_pembeli']);
        $username = htmlspecialchars($_POST['username']);
        $nama_pembeli = htmlspecialchars($_POST['nama_pembeli']);
        $password = htmlspecialchars($_POST['password']);
        $telepon = htmlspecialchars($_POST['telepon']);
        $email = htmlspecialchars($_POST['email']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $usia = $_POST['usia'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];

        // query SQL untuk insert data ke dalam Mysql
        $sql = "UPDATE pembeli SET username='$username', nama_pembeli='$nama_pembeli', password='$password',
telepon='$telepon', email='$email',alamat='$alamat', tgl_lahir='$usia', provinsi_p='$provinsi', kota_p='$kota' where id_pembeli='$id'";
        mysqli_query($conn, $sql);
        // mengalihkan ke halaman index.php
        try {
            mysqli_query($conn, $sql);
            echo "<script>alert('Data yang anda Update sukses');window.location='tampil_data.php'</script>";
        } catch (mysqli_sql_exception) {
            return "Update Failed";
        }
    }
}
?>