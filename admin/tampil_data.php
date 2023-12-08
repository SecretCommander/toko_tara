<?php
include ('koneksi.php');
include('function.php');
?>
<html>

<head>
    <title>Menampilkan data</title>
</head>

<body class="ms-5 mt-4">
    <?php
   
    
    //memanggi function
    $result = tampil_data();
    //mengeksekusi function didalam percabangan
    if (is_array($result)) {
        //jika data di tabel lebih besar dari 0 atau memiliki data maka eksekusi perulangan atau looping
        
            echo "<h1>Tampil Data Admin</h1>";
            echo "<table class='mt-5 table table-bordered' border='1' width='500'>";
            echo "<tr>";
            echo "<th>ID_PETUGAS</th>"; 
            echo "<th>NAMA_PETUGAS</th>";
            echo "<th>USERNAME</th>";
            echo "<th>PASSWORD</th>";
            echo "<th>TELP</th>";
            echo "</tr>";
            //loping data
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td> <center> " . $row['id_petugas'] . "</center></td>";
                echo "<td> <center> " . $row['nama_petugas'] . "</center></td>";
                echo "<td> <center> " . $row['username'] . "</center></td>";
                echo "<td> <center> " . $row['password'] . "</center></td>";
                echo "<td> <center> " . $row['telp'] . "</center></td>";
                echo "<td>";
                echo "<a href='detail.php?id=" . $row['id_petugas'] . " 'title='detail'>DETAIL|</a>";
                echo " | ";
                echo "<a href='update1.php?id=" . $row['id_petugas'] . " 'title='update'>UPDATE</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table><br>";
            //free result
            
            //namun jika tidak lebih besar dari pada > 0 atau tidak ditemukan data maka jalan perintah berikut
        } else {
            echo "Data masih kosong";
        }
        //percabangan result ketika function tidak bisa mengeksekusi perintah
     
    
    //close koneksi
    mysqli_close($conn);
    ?>

</body>

</html>