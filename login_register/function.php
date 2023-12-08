<?php
session_start();
require 'koneksi.php';

//Function Registrasi SQL
function register($conn, $username, $nama, $password, $telepon, $email, $alamat, $usia, $provinsi, $kota) {
    $sql = "INSERT INTO pembeli (username, nama_pembeli, password , telepon, email, alamat, tgl_lahir, provinsi_p, kota_p) 
    VALUES ('$username', '$nama','$password','$telepon','$email','$alamat','$usia','$provinsi','$kota')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
//Registrasi
function regist(){
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username   = htmlspecialchars($_POST['username']);
        $nama       = htmlspecialchars($_POST['nama']);
        $password   = htmlspecialchars($_POST['password']);
        $telepon    = htmlspecialchars($_POST['telepon']);
        $email      = htmlspecialchars($_POST['email']);
        $alamat     = htmlspecialchars($_POST['alamat']);
        $usia       = $_POST['usia'];
        $provinsi   = $_POST['provinsi'];
        $kota       = $_POST['kota'];

        
        if (register($conn, $username, $nama, $password, $telepon, $email, $alamat, $usia, $provinsi, $kota)) {
            echo "<script>alert('Registration successful'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Registration failed, Username Mungkin Sudah Ada');</script>";
        }
    }
}

//Login Function
function login($conn, $username, $password){
    $sql = "SELECT * FROM pembeli WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['id_pembeli'] = $row['id_pembeli'];
           }
        return true;
    } else {
        return false;
    }
}
//Login User
function user_data(){
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $remember =  isset($_POST['remember']);



        if (login($conn, $username, $password)) {
            if ($remember) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie('password', $password, time() + (86400 * 30), "/"); // 86400 = 1 day
            }

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: ../pe/html/index.php");
            exit();
        } else {
            $error_msg = '<div class="alert alert-danger">Login failed</div>';
            echo $error_msg;
        }
    }
}


?>

