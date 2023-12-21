<?php 
require_once 'function_pjl.php';
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
  }
}


if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id_pembeli'])) {
  header("location:auth-login-basic.php");
}


if (dataPembeli(trim($_SESSION['id_pembeli']))) {
  $row1 = mysqli_fetch_assoc($result);
  
} else {
  die("Login Terlebih Dahulu");
}
 registering();
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register Penjual</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img src="../assets/img/tara.png" alt="" height="100px">
                  </span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Kebebasan anda dimulai disini!🚀</h4>
              <p class="mb-4">Buat perjalanan bisnis anda menjadi lebih menyenangkan!</p>

              <form id="formAuthentication" class="mb-3" onsubmit="" method="POST">
                <div class="mb-3">
                  <label for="username" class="form-label">Nama Toko</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="nama_toko"
                    placeholder="Masukkan username anda"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <input type="hidden" value="<?php echo $row1['nama_pembeli'];?>" name="nama_penjual">
                <input type="hidden" name="telepon" value="<?php echo $row1['telepon'];?>">
                <input type="hidden" name="provinsi" value="<?php echo $row1['provinsi_p'];?>">
                <input type="hidden" name="kota" value="<?php echo $row1['kota_p'];?>">
                <input type="hidden" name="kecamatan" value="<?php echo $row1['kecamatan_p'];?>">
                <input type="hidden" name="alamat" value="<?php echo $row1['alamat'];?>">
                <button type="submit" class="btn btn-success d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Sudah Punya Akun?</span>
                <a href="auth-login-basic.php">
                  <span>Langsung Sign-in</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

 

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
