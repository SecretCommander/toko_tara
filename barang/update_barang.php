<?php
include 'koneksi.php';
include 'function.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $barang = mysqli_query($conn, "select * from barang where id_produk='$id'");
    $row = mysqli_fetch_array($barang);
    update_data();
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Edit Data BARANG</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $row['id_produk']; ?>" name="id_produk">
        <table>
            <tr>
                <td>NAMA PRODUK</td>
                <td><input type="text" value="<?php echo $row['nama_produk']; ?>" name="nama_produk"></td>
            </tr>

            <tr>
                <td>STOK PRODUK</td>
                <td><input type="text" value="<?php echo $row['jumlah_produk']; ?>" name="Stok_produk"></td>
            </tr>



            <tr>
                <td>KATEGORI PRODUK</td>
                <td>
                    <select name="kategori_produk">
                        <!-- selected -->
                        <?php echo $row['kategori_produk']; ?>
                        <option value="Makanan" <?php echo ($row['kategori_produk'] == 'Makanan') ? 'selected' : ''; ?>>
                            Makanan</option>
                        <option value="Minuman" <?php echo ($row['kategori_produk'] == 'Minuman') ? 'selected' : ''; ?>>
                            Minuman</option>
                        <option value="Pakaian" <?php echo ($row['kategori_produk'] == 'Pakaian') ? 'selected' : ''; ?>>
                            Pakaian</option>
                        <option value="Bubuk" <?php echo ($row['kategori_produk'] == 'Bubuk') ? 'selected' : ''; ?>>Bubuk
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><img src="img/<?php echo $row['foto_produk'] ?>" style="width:100px;"></td>
                <td>FOTO PRODUK</td>
                <td><input type="file" value="<?php echo $row['foto_produk']; ?>" name="foto_produk" accept="image/*">
                </td>
            </tr>

            <tr>
                <td>HARGA PRODUK</td>
                <td><input type="text" value="<?php echo $row['harga_produk']; ?>" name="harga_produk"></td>
            </tr>

            <tr>
                <td>BERAT PRODUK</td>
                <td><input type="number" value="<?php echo $row['berat']; ?>" name="berat"></td>
            </tr>

            <tr>
                <td>DESKRIPSI PRODUK</td>
                <td><input type="text" value="<?php echo $row['deskripsi_produk']; ?>" name="deskripsi_produk"></td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" value="simpan">Update Data</button></td>
            </tr>

        </table>
    </form>
</body>

</html>