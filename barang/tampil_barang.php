<?php
include('koneksi.php');
include('function.php');
?>
<html>

<head>
    <title>Menampilkan data </title>
</head>

<body class="ms-5 mt-4">

    <form action="s_barang.php" method="POST">
        <Label>Cari Barang : <br></Label>
        <input type="text" name="keyword">

        <button type="submit" name="cari"> Cari: </button>
    </form>

    <?php
    //memanggi function
    $result = tampil_data();
    //mengeksekusi function didalam percabangan
    if ($result) {
        //jika data di tabel lebih besar dari 0 atau memiliki data maka eksekusi perulangan atau looping
        if (mysqli_num_rows($result) > 0) {
            echo "<h1>Tampil Data</h1>";
            echo "<table class='mt-5 table table-bordered' border='1' width='500'>";
            echo "<tr>";
            echo "<th>ID PRODUK</th>";
            echo "<th>NAMA PRODUK</th>";
            echo "<th>FOTO PRODUK</th>";
            echo "<th>STOK PRODUK</th>";
            echo "<th>KATEGORI PRODUK</th>";
            echo "<th>HARGA PRODUK</th>";
            echo "<th>BERAT PRODUK</th>";
            echo "<th>DESKRIPSI PRODUK</th>";
            echo "<th>TANGGAL UPLOAD</th>";
            echo "<th>AKSI</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_produk'] . "</td>";
                echo "<td>" . $row['nama_produk'] . "</td>";
                echo "<td><img src='img/" . $row['foto_produk'] . "'style='width:100px;'> <p>" . $row['foto_produk'] . "<p></td>";
                echo "<td>" . $row['jumlah_produk'] . "</td>";
                echo "<td>" . $row['kategori_produk'] . "</td>";
                echo "<td>" . $row['harga_produk'] . "</td>";
                echo "<td>" . $row['berat'] . "</td>";
                echo "<td>" . $row['deskripsi_produk'] . "</td>";
                echo "<td>" . $row['tgl_upload'] . "</td>";
                echo "<td>";
                echo "<a href='detail_barang.php?id=" . $row['id_produk'] . " 'title='detail'>DETAIL</a>";
                echo " | ";
                echo "<a href='update_barang.php?id=" . $row['id_produk'] . " 'title='update'>UPDATE</a>";
                echo " | ";
                echo "<a href='delete.php?id=" . $row['id_produk'] . " 'title='delete' onclick='return confirmDelete();'>DELETE</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table><br>";
            echo "<a class='btn btn-danger' href='i_barang.php'>Tambah Barang</a>";
            //free result
            mysqli_free_result($result);
            //namun jika tidak lebih besar dari pada > 0 atau tidak ditemukan data maka jalan perintah berikut
        } else {
            echo "Data masih kosong";
        }
        //percabangan result ketika function tidak bisa mengeksekusi perintah
    } else {
        echo "Terjadi kesalahan. Coba lagi
nanti" . mysqli_error($conn);
    }
    //close koneksi
    mysqli_close($conn);
    ?>

</body>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
    }
</script>

</html>