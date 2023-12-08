<?php
include 'koneksi.php';
include 'function.php';
//DONE not working anymore
loginn();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body>
    <form method="POST">
        <fieldset>
        <legend>Login</legend>
        <p>
            <label>Username:</label>
            <input type="text" name="username" />
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="password" />
        </p>
        <p>
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Remember Me:</label>
</p>
        <p>
            <input type="submit" name="submit" value="login" />
        </p>
        </fieldset>
    </form>
</body>
</html>