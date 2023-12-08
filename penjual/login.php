<?php
include 'koneksi.php';
include 'function.php';

logen();
?>
    <form  method="POST">
        <fieldset>
        <legend>Login</legend>
        <p>
            <label>Nama Toko:</label>
            <input type="text" name="nama_toko" />
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="password" />
        </p>
        <p>
            <input type="submit" name="submit" value="login" />
        </p>
        </fieldset>
    </form>
