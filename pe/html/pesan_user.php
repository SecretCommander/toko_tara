<?php

include 'koneksi.php';
include 'function.php';
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id_pembeli'])) {
    header("location: ../../login_register/index.php");
}


if (detail_data(trim($_SESSION['id_pembeli']))) {
    $row1 = mysqli_fetch_array($result);
} else {
    die("Data tidak ditemukan");
}


mysqli_close($conn);
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body style="background-color: #31AB42;">
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <div class="card-body text-center">
            <img src="profile/<?php echo $row1['profile'] == "" || $row1['profile'] == null ? "nopict.png" : $row1['profile']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
            <h5 class="my-3"><?= $row1['username'] ?></h5>
            <hr>

            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Profile</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="pesan_user.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message-dots"></i>
                <div data-i18n="Analytics">Pesan</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="faq.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="Analytics">FAQ</div>
              </a>
              </a>
            </li>

            <li class="menu-item">
              <a href="#" class="menu-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Analytics">LogOut</div>
              </a>
            </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->


        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col">
                      <div class="card-body">
                        <p class="text-center">Fitur Pesan Coming Soon!!
                          <a href="whatsapp://send?text=Hello&phone=+6285760163171"
                            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-50-hover">WhatsApp
                            TokoTara.</a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">logout??</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          apakah anda yakin ingin logout dari akun anda?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="../../login_register/logout.php"><button
            type="button"
            class="btn btn-danger">logout</button></a>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>