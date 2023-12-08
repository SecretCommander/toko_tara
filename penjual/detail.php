<?php
include('koneksi.php');
include('function.php');
?>
<html>

<head>
    <title>DETAIL DATA </title>
</head>

<body>
    <?php
    if (!empty($_GET['id'])) {
        if (detail_data(trim($_GET['id']))) {
            $row = mysqli_fetch_array($result);
        } else {
            die("Data tidak ditemukan");
        }
    } else {
        die("error");
    }
    mysqli_close($conn);
    ?>
    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>NAMA TOKO</th>
            <th>NAMA PENJUAL</th>
            <th>PASSWORD</th>
            <th>FOTO TOKO</th>
            <th>TELEPON</th>
            <th>EMAIL</th>
            <th>PROVINSI</th>
            <th>KOTA</th>
            <th>ALAMAT</th>
            <th>SLOGAN</th>
            <th>DESKRIPSI</th>
        </tr>
        <tr>
            <td>
                <?php echo $row['id_penjual']; ?>
            </td>
            <td>
                <?php echo $row['nama_toko']; ?>
            </td>
            <td>
                <?php echo $row['nama_penjual']; ?>
            </td>
            <td>
                <?php echo $row['password']; ?>
            </td>
            <td><img src="img/<?php echo $row['foto_toko'] ?>" width="100px">
            <td>
                <?php echo $row['telepon']; ?>
            </td>
            <td>
                <?php echo $row['email']; ?>
            </td>
            <td>
                <?php echo $row['provinsi']; ?>
            </td>
            <td>
                <?php echo $row['kota']; ?>
            </td>
            <td>
                <?php echo $row['alamat']; ?>
            </td>
            <td>
                <?php echo $row['slogan']; ?>
            </td>
            <td>
                <?php echo $row['deskripsi']; ?>
            </td>
        </tr>
        <tr>
            <br><a href="javascript:history.back()">Kembali</a></br>
            </form>
</body>

</html>