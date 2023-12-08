<?php
include ('koneksi.php');
include ('function.php');
?>
<html>
<head>
<title>DETAIL DATA </title>
</head>
<body>
<?php
if(!empty($_GET['id'])){
if(detail_data(trim($_GET['id']))){
 $row=mysqli_fetch_array($result);
}else{
 die ("Data tidak ditemukan");
}
}else{
 die("error");
}
mysqli_close($conn);
?>
<table border="1" width="500">
<tr>
<th>ID</th>
<th>USERNAME</th>
<th>NAMA PEMBELI</th>
<th>PASSWORD</th>
<th>TELEPON</th>
<th>EMAIL</th>
<th>ALAMAT</th>
<th>USIA</th>
<th>Provinsi</th>
<th>Kota</th>
</tr>
<tr>
<td><?php echo $row['id_pembeli'];?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['nama_pembeli'];?></td>
<td><?php echo $row['password'];?></td>
<td><?php echo $row['telepon'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['alamat'];?></td>
<td><?php echo $row['tgl_lahir'];?></td>
<td><?php echo $row['provinsi_p'];?></td>
<td><?php echo $row['kota_p'];?></td>
</tr>
<a href="javascript:history.back()">Kembali</a>
</form>
</body>
</html>
