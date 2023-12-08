<?php
include 'koneksi.php';

function register($conn, $id_petugas, $nama_petugas, $username, $password, $telepon)
{
    $sql = "INSERT INTO pembeli (id_petugas, nama_petugas,username, password , telp) 
    VALUES ('$id_petugas', '$nama_petugas','$username','$password','$telepon')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function regist()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        global $conn;
        $id_petugas = $_POST['id_petugas'];
        $nama_petugas = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telepon = $_POST['telp'];


        if (register($conn, $id_petugas, $nama_petugas, $username, $password, $telepon)) {
            echo "Registration successful";
        } else {
            echo "Registration failed";
        }
    }
}
function tampil_data(){
    global $conn;
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } else{
        return "0 results";
    }

}
function detail_data($conn, $id){
$id =mysqli_real_escape_string($conn,$id);
$sql = "SELECT * FROM admin where id_petugas=$id";
$result = mysqli_query($conn,$sql);
if($result && mysqli_num_rows($result) > 0){
    return mysqli_fetch_assoc($result);
}else{
    return null;
}
}
function update_data($var_id, $username, $password){
    global $koneksi;
    $sql ="UPDATE admin SET username=?, password=? where id_petugas=?";
    if($stmt=mysqli_prepare($koneksi,$sql)){
        mysqli_stmt_bind_param($stmt,"ssi",$param_username,$param_password,$param_id_petugas);
        $param_id_petugas = $var_id;
        $param_username = $username;
        $param_password = $password;
        if(mysqli_stmt_execute($stmt)){
            return true;
        }else{
            return false;
        }
    }
}

include "koneksi.php";
function login($conn, $username, $password) {
    $sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return "<script>alert('Login successful'); window.location.href='tampil_data.php';</script>";
    } else {
        return "Login failed";
    }
}
function loginnn(){
    global $conn;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = login($conn, $username, $password);
    echo $result;

}   
}
function update(){
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id             = $_POST['id_petugas'];
$nama_petugas   = $_POST['nama_petugas'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$telp           = $_POST['telp'];
$sql="UPDATE admin SET username='$username', nama_petugas='$nama_petugas', password='$password', telp='$telp' where id_petugas='$id'";
try{
mysqli_query($conn, $sql);
echo "<script>alert('Data yang anda Update sukses');window.location='tampil_data.php'</script>";
}
catch(mysqli_sql_exception){
    return "Update Failed";
}
    }
}

?>