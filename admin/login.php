<?php 
include 'koneksi.php';
include 'function.php';

loginnn();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Admin</title>
</head>
<body>
    <form method="POST">
        <fieldset>
        <legend>Login petugas</legend>
       <p>
            <label>Username:</label>
            <input type="text" name="username" />
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
</body>
</html>