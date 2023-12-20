<?php
require 'koneksi.php';
//Registrasi (Not Used) 
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
//Registrasi (Not Used)
function regist()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username     = $_POST['username'];
        $nama_pembeli = $_POST['nama_pembeli'];
        $password     = $_POST['password'];
        $telepon      = $_POST['telepon'];
        $email        = $_POST['email'];
        $alamat       = $_POST['alamat'];
        $usia         = $_POST['usia'];

        if (register($conn, $username, $nama_pembeli, $password, $telepon, $email, $alamat, $usia)) {
            echo "Registration successful";
        } else {
            echo "Registration failed";
        }
    }
}

//Tampil Data(not Used)
function tampil_data()
{
    global $conn;
    $sql = "SELECT * FROM pembeli";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//Profile Pemebeli/User
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

//Login (not use)
function login($conn, $username, $password)
{
    $sql = "SELECT * FROM pembeli WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        return "<script>alert('Login successful'); window.location.href='tampil_data.php';</script>";
    } else {
        return "Login failed";
    }
}
//login
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

//Update Profile
function update()
{
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id_pembeli'];
        $username = htmlspecialchars($_POST['username']);
        $nama_pembeli = htmlspecialchars($_POST['nama_pembeli']);
        $password = htmlspecialchars($_POST['password']);
        $telepon = htmlspecialchars($_POST['telepon']);
        $email = htmlspecialchars($_POST['email']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $usia = $_POST['usia'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $camat = $_POST['camat'];


        $queryShow = "SELECT * FROM pembeli WHERE  id_pembeli = '$id';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if ($_FILES["profile"]["name"] == "") {
            $foto = $result["profile"];
        } else {
            $split = explode('.', $_FILES['profile']['name']);
            $ext = $split[count($split) - 1];

            $filepath = "profile/" . $result['profile'];
            $foto = uniqid() . "." . $ext;
            if (file_exists($filepath) && $filepath != "profile/") {
                unlink("profile/" . $result['profile']);
            }
            move_uploaded_file($_FILES["profile"]["tmp_name"], "profile/" . $foto);
        }

        // query SQL untuk insert data ke dalam Mysql
        $sql = "UPDATE pembeli SET username='$username',profile='$foto' , nama_pembeli='$nama_pembeli', password='$password',
telepon='$telepon', email='$email',alamat='$alamat', tgl_lahir='$usia', provinsi_p='$provinsi', kota_p='$kota', kecamatan_p='$camat' where id_pembeli='$id'";

        // mengalihkan ke halaman index.php
        try {
            mysqli_query($conn, $sql);
            echo "<script>alert('Data yang anda Update sukses');window.location='index.php';</script>";
        } catch (mysqli_sql_exception) {
            return "Update Failed";
        }
    }
}
?>