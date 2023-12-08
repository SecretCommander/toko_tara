<?php
include 'koneksi.php';
include 'function.php';

$id         = $_GET['id'];
$sql   = mysqli_query($conn, "select * from admin where id_petugas='$id'");
$row        = mysqli_fetch_array($sql);
 
update();

?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Form Edit Admin</title>
    </head>
    <body>
        <form method="post" >
            <input type="hidden" value="<?php echo $row['id_petugas'];?>" name="id_petugas">
            <table>                 
                <tr><td>Id_Petugas</td><td><input type="text" value="<?php echo $row['id_petugas'];?>" name="id_petugas"></td></tr>

                <tr><td>Nama_Petugas</td><td><input type="text" value="<?php echo $row['nama_petugas'];?>" name="nama_petugas"></td></tr>

                <tr><td>Username</td><td><input type="text" value="<?php echo $row['username'];?>" name="username"></td></tr>

                <tr><td>Password</td><td><input type="text" value="<?php echo $row['password'];?>" name="password"></td></tr>

                <tr><td>Telp</td><td><input type="text" value="<?php echo $row['telp'];?>"name="telp"></td></tr>
                                              
                <tr><td colspan="2"><button type="submit" value="simpan">Update Admin</button></td></tr>
 
            </table>
        </form>
    </body>
</html>