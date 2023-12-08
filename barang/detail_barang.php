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
            <th>ID PRODUK</th>
            <th>NAMA PRODUK</th>
            <th>GAMBAR PRODUK</th>
            <th>STOK PRODUK</th>
            <th>KATEGORI PRODUK</th>
            <th>HARGA PRODUK</th>
            <th>BERAT PRODUK</th>
            <th>DESKRIPSI PRODUK</th>
            <th>TANGGAL UPLOAD</th>
        </tr>
        <tr>
            <td><?php echo $row['id_produk']; ?></td>
            <td><?php echo $row['nama_produk']; ?></td>
            <td><img src="img/<?php echo $row['foto_produk']?>" width="100px">
                <?php echo $row['nama_produk']; ?></td>
            <td><?php echo $row['jumlah_produk']; ?></td>
            <td><?php echo $row['kategori_produk']; ?></td>
            <td><?php echo $row['harga_produk']; ?></td>
            <td><?php echo $row['berat']; ?></td>
            <td><?php echo $row['deskripsi_produk']; ?></td>
            <td><?php echo $row['tgl_upload']; ?></td>
        </tr>
        <a href="javascript:history.back()">Kembali</a>
        </form>
</body>

</html>