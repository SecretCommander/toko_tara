<?php
require_once 'function.php';
require 'koneksi.php';

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
  $cookieUsername = $_COOKIE['username'];
  $cookiePassword = $_COOKIE['password'];

  $cookieUsername = mysqli_real_escape_string($conn, $cookieUsername);
  $cookiePassword = mysqli_real_escape_string($conn, $cookiePassword);

  $query = "SELECT * FROM pembeli WHERE username='$cookieUsername' AND password='$cookiePassword'";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['id_pembeli'] = $user['id_pembeli'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['password'] = $user['password'];

    header('Location: ../pe/html/index.php');
    exit();
  }


}

user_data();

?>
<!DOCTYPE html>
<html>

<head>
  <title>Login | TOKO TARA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
  content="Login Page untuk mengakses lebih lanjut
           Website TOKO TARA dan Berbelanja UMKM.">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&family=Dosis:wght@500&display=swap"
    rel="stylesheet">
  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <div class="container-fluid">
    <div class="row py-5 px-5 align-middle">
      <div class="col-md-6">
        <div class="image-container d-flex justify-content-center align-items-center h-100">
          <img src="img/lg1.png" alt="" class="img-fluid h-50">
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-container">
          <!-- Your form HTML here -->
          <form autocomplete="off" method="POST">
            <center>
              <h2>Login</h2>
            </center><br>
            <div class="input-section">
              <label for="name-input">Username<span class="required-color">*</span></label>
              <input type="text" placeholder="Enter Your Name" id="name-input" name="username" autocomplete="off" required />
              <span id="first-name-error" class="hide required-color error-message">Invalid Input</span>
              <span id="empty-first-name" class="hide required-color error-message"> Name Cannot Be Empty</span>
            </div>
            <div class="">
              <label for="name-input">Password <span class="required-color">*</span></label>
              <input type="password" placeholder="Enter Password" id="password" name="password" autocomplete="off" required />

              <span id="password-error" class="hide required-color error-message">
                Passwords Should Have Letter, Special symbols, Numbers And Length >=
                8
              </span>
              <span id="empty-password" class="hide required-color error-message">
                Password Cannot Be Empty
              </span>
            </div>
            <div class="input-section my-3">
              <input style="display: inline-block;" type="checkbox" id="remember" name="remember">
              Remember Me:
            </div>


            <div>
              <div id="error-message" class="error-message hide" style="color: #ff4747;">Maximum image size is 500KB
              </div><br>
              <div id="image-preview" class="image-preview">
              </div>
            </div>
            <center><input type="submit" name="submit" value="Sign In"><br>
              Don't have account yet?
              <a class="" href="register.php">Sign Up</a>

            </center>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!-- Bootstrap JS and Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>

</html>