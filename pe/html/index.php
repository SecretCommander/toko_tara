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
update();

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
    <link rel="stylesheet" href="../assets/css/pp.css" />

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
                        <img src="profile/<?php echo $row1['profile'] == "" || $row1['profile'] == null ? "nopict.png" : $row1['profile']; ?>"
                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height:150px;">
                        <h5 class="my-3">
                            <?= $row1['username'] ?>
                        </h5>
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
                                            <form method="POST" enctype="multipart/form-data">
                                                <input type="hidden" value="<?php echo $row1['id_pembeli']; ?>"
                                                    name="id_pembeli">
                                                <div class="card-body">
                                                    <h5 class="card-title text-primary"> </h5>
                                                    <!-- <div class="card-body text-center">
                            <img src="1.jpg" alt="foto profile"
                              class="rounded-circle img-fluid mb-3" style="width: 150px;"> <br>
                              <h4>Ubah Profile Anda</h4> <hr>
                              <div class="col ms-5 me-5">  -->
                                                    <div class="profile-pic card-body text-center">
                                                        <label class="-label" for="file">
                                                            <span class="glyphicon glyphicon-camera"></span>
                                                            <p>Ubah Profile Anda </p>
                                                        </label><br>
                                                        <img src="profile/<?php echo $row1['profile'] == "" || $row1['profile'] == null ? "nopict.png" : $row1['profile']; ?>"
                                                            id="output" class="rounded-circle img-fluid mb-4"
                                                            style="width:180px; height:180px;" /><br>
                                                        <input class="mx-auto my-auto "
                                                            value="<?php echo $row1['profile'] == "" ? "" : $row1['profile']; ?>"
                                                            name="profile" id="file" type="file"
                                                            onchange="loadFile(event)" />
                                                    </div>
                                                    <div class="card ">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Username</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $row1['username'] ?>" name="username"
                                                                        aria-label="Username">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Email</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $row1['email'] ?>" name="email"
                                                                        aria-label="email">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Phone</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        value="<?= $row1['telepon'] ?>" name="telepon"
                                                                        aria-label="Phone">
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Provinsi</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                <select name="provinsi" id="provinsi" class="form-select" aria-label="Default select example">
                                                                    <option>Pilih</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Kota</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                <select name="kota" id="kota" class="form-select" aria-label="Default select example">
                                                                    <option>Pilih</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <p class="mb-0">Kecamatan</p>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                <select name="camat" id="camat" class="form-select" aria-label="Default select example">
                                                                <option>Pilih</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden"
                                                                value="<?php echo $row1['nama_pembeli']; ?>"
                                                                name="nama_pembeli">
                                                            <input type="hidden"
                                                                value="<?php echo $row1['password']; ?>"
                                                                name="password">
                                                            <input type="hidden"
                                                                value="<?php echo $row1['tgl_lahir']; ?>" name="usia">
                                                            <hr>
                                                            <input class="btn btn-outline-warning ms-5 me-5"
                                                                type="submit" value="Ubah">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                logout??</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            apakah anda yakin ingin logout dari akun anda?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <a href="../../login_register/logout.php"><button
                                                                    type="button"
                                                                    class="btn btn-danger">logout</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
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

    <!-- preview gambar -->
    <script>
        var loadFile = function (event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</body>


</body>
<!-- fungsi API provinsi/kota/kecamatan -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- provinsi -->
<script>
    const selectProvinsi = document.getElementById('provinsi');
    const selectedProvinsi = "<?php echo $row1['provinsi_p'];?>";
    const selectKota = document.getElementById('kota');
    const selectedKota = "<?php echo $row1['kota_p'];?>";
    const selectedKecamatan = "<?php echo $row1['kecamatan_p'];?>";
    console.log(`pilihan :${selectedKecamatan}`);
    const selectKecamatan = document.getElementById('camat');
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => {
            var data = provinces;
            var tampung = '<option>Pilih</option>';
            
            
            data.forEach(element => {
               
                var selectedp = element.name == selectedProvinsi ? 'selected' : '';
                tampung +=
                    `<option data-reg="${element.id}" value="${element.name}" ${selectedp}>${element.name}</option>`;
            });
            document.getElementById('provinsi').innerHTML = tampung;
            
            document.getElementById('provinsi').dispatchEvent(new Event('change'));

           
        });
    </script>
<!-- kabupaten/kota  -->
<script>
   

    selectProvinsi.addEventListener('change', (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
        
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
            .then(response => response.json())
            .then(regencies => {
                var data = regencies;
                var tampung = '<option>Pilih</option>';
                
                
                data.forEach(element => {
                    var selectedk = element.name == selectedKota ? 'selected' : '';
                    tampung +=
                        `<option data-dist="${element.id}" value="${element.name}" ${selectedk}>${element.name}</option>`;
                });
                document.getElementById('kota').innerHTML = tampung;
                
                document.getElementById('camat').innerHTML = '<option>Pilih</option>';

                document.getElementById('kota').dispatchEvent(new Event('change'));

                
            });
    });
</script>
<!-- Kecamatan/kelurahan -->
<script>
    
    selectKota.addEventListener('change', (e) => {
    var kota = e.target.options[e.target.selectedIndex].dataset.dist;

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kota}.json`)
        .then(response => response.json())
        .then(districts => {
            var data = districts;
            var tampung = '<option>Pilih</option>';

            data.forEach(element => {
                var selectedc = element.name === selectedKecamatan ? 'selected' : '';
                tampung += `<option data-vill="${element.id}" value="${element.name}" ${selectedc}>${element.name}</option>`;
            });

            document.getElementById('camat').innerHTML = tampung;
            document.getElementById('camat').dispatchEvent(new Event('change'));
    });
});
</script>

</html>