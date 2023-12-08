<?php
include ('koneksi.php');
include ('function.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    

    $data = detail_data($conn,$id);
    if($data){
        echo "<h1>Detail Data</h1>";
        echo "<p>ID: ". $data['id_petugas']. "</p>";
        echo "<p>nama: ". $data['nama_petugas']. "</p>";
        echo "<p>username: ". $data['username']. "</p>";
        echo "<p>password: ". $data['password']. "</p>";
        echo "<p>no telepon: ". $data['telp']. "</p>";
    } else {
        echo "data tidak ada";
    }

}
?>