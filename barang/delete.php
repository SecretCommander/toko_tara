<?php
include('koneksi.php');
include('function.php');
?>
<html>

<head>
    <title>HAPUS DATA </title>
</head>

<body>
    <?php
    if (!empty($_GET['id'])) {
        if (delete_item(trim($_GET['id']))) {
            echo "<script>alert('Item deleted successfully'); window.location.href='tampil_barang.php';</script>";
        } else {
            die("Data tidak ditemukan");
        }
    } else {
        die("error");
    }
    mysqli_close($conn);
    ?>
    
</body>

</html>