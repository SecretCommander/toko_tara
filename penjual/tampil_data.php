<?php
include('koneksi.php');
include('function.php');
?>
<html>

<head>
    <title>Menampilkan data </title>
</head>

<body class="ms-5 mt-4">
    <?php
    //memanggi function
    $result = tampil_data();
    //mengeksekusi function didalam percabangan
    if ($result) {
        //jika data di tabel lebih besar dari 0 atau memiliki data maka eksekusi perulangan atau looping
        if (mysqli_num_rows($result) > 0) {
            echo "<h1>Tampil Data Penjual</h1>";
            echo "<table class='mt-5 table table-bordered' border='1' width='500'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>NAMA TOKO</th>";
            echo "<th>NAMA PENJUAL</th>";
            echo "<th>PASSWORD</th>";
            echo "<th>FOTO TOKO</th>";
            echo "<th>TELEPON</th>";
            echo "<th>EMAIL</th>";
            echo "<th>PROVINSI</th>";
            echo "<th>KOTA</th>";
            echo "<th>ALAMAT</th>";
            echo "<th>SLOGAN</th>";
            echo "<th>DESKRIPSI</th>";
            echo "<th>AKSI</th>";
            echo "</tr>";
            //loping data
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td> <center> " . $row['id_penjual'] . "</center></td>";
                echo "<td> <center> " . $row['nama_toko'] . "</center></td>";
                echo "<td> <center> " . $row['nama_penjual'] . "</center></td>";
                echo "<td> <center> " . $row['password'] . "</center></td>";
                echo "<td><img src='img/" . $row['foto_toko'] . "'style='width:100px;'</td>";
                echo "<td> <center> " . $row['telepon'] . "</center></td>";
                echo "<td> <center> " . $row['email'] . "</center></td>";
                echo "<td> <center> " . $row['provinsi'] . "</center></td>";
                echo "<td> <center> " . $row['kota'] . "</center></td>";
                echo "<td> <center> " . $row['alamat'] . "</center></td>";
                echo "<td> <center> " . $row['slogan'] . "</center></td>";
                echo "<td> <center> " . $row['deskripsi'] . "</center></td>";
                echo "<td>";
                echo "<a href='detail.php?id=" . $row['id_penjual'] . " 'title='detail'>DETAIL|</a>";
                echo " | ";
                echo "<a href='update.php?id=" . $row['id_penjual'] . " 'title='update'>UPDATE</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table><br>";
            echo "<a href='register.php'>Input Data Penjual</a>";
            //free result
            mysqli_free_result($result);
            //namun jika tidak lebih besar dari pada > 0 atau tidak ditemukan data maka jalan perintah berikut
        } else {
            echo "Data masih kosong";
        }
        //percabangan result ketika function tidak bisa mengeksekusi perintah
    } else {
        echo "Terjadi kesalahan. Coba lagi nanti" . mysqli_error($conn);
    }
    //close koneksi
    mysqli_close($conn);
    ?>

</body>

</html>