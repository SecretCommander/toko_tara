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
            echo "<h1>Tampil Data Pembeli</h1>";
            echo "<table class='mt-5 table table-bordered' border='1' width='500'>";
            echo "<tr>";
            echo "<th>ID</th>"; 
            echo "<th>USERNAME</th>";
            echo "<th>NAMA PEMBELI</th>";
            echo "<th>PASSWORD</th>";
            echo "<th>TELEPON</th>";
            echo "<th>EMAIL</th>";
            echo "<th>ALAMAT</th>";
            echo "<th>USIA</th>";
            echo "<th>provinsi</th>";
            echo "<th>kota</th>";
            echo "<th>AKSI</th>";
            echo "</tr>";
            //loping data
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_pembeli'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['nama_pembeli'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['telepon'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['tgl_lahir'] . "</td>";
                echo "<td>" . $row['provinsi_p'] . "</td>";
                echo "<td>" . $row['kota_p'] . "</td>";
                echo "<td>";
                echo "<a href='detail.php?id=" . $row['id_pembeli'] . " 'title='detail'>DETAIL</a>";
                echo " | ";
                echo "<a href='update1.php?id=" . $row['id_pembeli'] . " 'title='update'>UPDATE</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table><br>";
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

</html>