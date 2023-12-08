<?php
include 'koneksi.php';
include 'function.php';
regist();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
</head>
<body>
    <form  method="POST">
        <fieldset>
        <legend>Registrasi</legend>
        <p>
            <label>Username:</label>
            <input type="text" name="username" />
        </p>
        <p>
            <label>Nama:</label>
            <input type="text" name="nama_pembeli" />
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="password" />
        </p>
        <p>
            <label>Telepon:</label>
            <input type="text" name="telepon" />
        </p>
        <p>
            <label>Email:</label>
            <input type="text" name="email" />
        </p>
        <p>
            <label>Alamat:</label>
            <input type="text" name="alamat" />
        </p>
        <p>
            <label>Tgl lahir:</label>
            <input type="date" name="usia" />
        </p>
        <p>
            <input type="submit" name="submit" value="Register" />
        </p>
        </fieldset>
    </form>
</body>
</html>