<?php
session_start();
include 'koneksi.php';
include 'function.php';

if (!isset($_SESSION['penjual_id'])) {
    header("location: ../../penjual/login.php");
}
input_data();
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
>

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <img src="../assets/img/tara.png" alt="" width="190px">
            <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span> -->
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <li class="menu-item">
            <a href="index.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div>Rumah</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="toko.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-store-alt"></i>
              <div>Toko</div>
            </a>
          </li>
          <li class="menu-item active open">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div>Produk</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item active">
                <a href="tambah-produk.php" class="menu-link">
                  <div>Tambah Produk</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="list-produk.php" class="menu-link">
                  <div>List Produk</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login-basic.html">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body d-none d-sm-block">
                      <div class="col-12 ">
                        <div class="row">
                          <div class="col-9">
                            <h4 class="">Tambahkan Produk Anda</h4>
                          </div>
                          <div class="col-3">
                            <div class="text-end border border-success p-1 rounded justify-content-end">Produk Tersisa
                              50/30</div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <h5>Informasi Produk</h5>
                        <p class="p-1 border border-warning col-5 rounded text-end">Pastikan produk anda tidak melanggar
                          HAKI</p>
                      </div>
                      <div class="col-12">
                        <div class="row border border-success rounded">
                          <div class="col-4">
                            <div class="card-body">
                              <label for="name" class="fw-bold">Nama Produk</label>
                              <p class="mt-3">Nama produk min.50 karakter <br> dan wajib memasukkan nama <br>
                                brand,jenis <br> produk,warna,bahan,atau tipe</p>
                            </div>
                          </div>
                          <div class="col-8">
                            <div class="card-body">
                              <textarea class="form-control" name="np" id="name" cols="30" rows="3" maxlength="150"
                                onkeyup="charCountUpdate(this.value)"></textarea>
                              <p id="charCount">0/150</p>
                            </div>
                          </div>
                        </div>
                        <div class="row border border-success rounded mt-3">
                          <div class="col-4">
                            <div class="card-body">
                              <h6 for="defaultSelect" class="fw-bold">Kategori Produk</h6>
                              <p class="mt-3">Pilihlah kategori yang <br> sesuai dengan produk <br> anda <a
                                  href="">Pelajari Selengkapnya</a></p>
                            </div>
                            <div class="card-body">
                              <h6 class="fw-bold">Spesifikasi Produk</h6>
                              <label for="berat" class="mt-2 mb-3">Berat Produk</label><br>
                              <label for="lebar" class="mt-5 mb-3">Ukuran Produk</label><br>
                              <label for="stok" class="mt-5 mb-3">Stok Produk</label>
                              <p class="mt-4">Apakah produk anda barang pecah belah ?</p>
                            </div>
                          </div>
                          <div class="col-8 mt-4">
                            <div class="card-body mb-5">
                              <div class="mb-3">
                                <select id="defaultSelect" class="form-select" name="kate" required>
                                  <option value="Makanan">Makanan</option>
                                  <option value="Minuman">Minuman</option>
                                  <option value="Pakaian">Pakaian</option>
                                  <option value="Bubuk">Bubuk</option>
                                </select>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="input-group input-group-merge mt-5">
                                <input id="berat" name="berat" type="number" class="form-control" placeholder="1000" aria-label="1000"
                                  aria-describedby="basic-addon33" />
                                <span class="input-group-text" id="basic-addon33">gram</span>
                              </div>
                              <div class="col-12">
                                <div class="row">
                                  <div class="col-4">
                                    <div class="input-group input-group-merge mt-5 col-4">
                                      <span class="input-group-text" id="basic-addon33">Panjang:</span>
                                      <input id="panjang" name="panjang" type="number" class="form-control" placeholder="10"
                                        aria-label="10" aria-describedby="basic-addon33" />
                                      <span class="input-group-text" id="basic-addon33">cm</span>
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="input-group input-group-merge mt-5 col-4">
                                      <span class="input-group-text" id="basic-addon33">Lebar:</span>
                                      <input id="lebar" type="number" name="lebar" class="form-control" placeholder="10"
                                        aria-label="10" aria-describedby="basic-addon33" />
                                      <span class="input-group-text" id="basic-addon33">cm</span>
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="input-group input-group-merge mt-5 col-4">
                                      <span class="input-group-text" id="basic-addon33">Tinggi:</span>
                                      <input id="tinggi" type="number" name="tinggi" class="form-control" placeholder="10"
                                        aria-label="10" aria-describedby="basic-addon33" />
                                      <span class="input-group-text" id="basic-addon33">cm</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="input-group input-group-merge mt-5">
                                <input id="stok" type="number" name="jlh" class="form-control" placeholder="1000" aria-label="1000"
                                  aria-describedby="basic-addon33" />
                                <span class="input-group-text" id="basic-addon33">pcs</span>
                              </div>
                              <div class="form-check form-switch mt-5">
                                <input class="form-check-input" type="checkbox" role="switch"
                                  id="flexSwitchCheckDefault" name="belah">
                              </div>
                            </div>
                          </div>
                        </div>
                        <h5 class="mt-5">Dokumentasi Produk</h5>
                        <div class="row border border-success rounded mt-3">
                          <div class="col-6">
                            <div class="card-body">
                              <h6 class="fw-bold">Video dan Foto Produk</h6>
                              <div class="border border-secondary rounded p-1">
                                <div class="row">
                                  <img class="col-2" style="display: inline-block;" width="25" height="15" src=""
                                    alt="general-warning-sign" />
                                  <small class="col-10">Pastikan foto produk berekstensi JPG,JPEG,PNG dan pastikan
                                    berukuran 3x4 Untuk video ukuran maks 30 MB dan resolusi maks 1.280x1.280 serta
                                    durasi 10-60 detik dan menggunakan format MP4</small>
                                </div>
                              </div>
                              <div class="mt-3">
                                <div class="file-input">
                                  <input type="file" id="file1" class="input-file"
                                    onchange="displayImage(this, 'preview1')" name="vidi"  accept="video/*">
                                  <label for="file1" class="label">Video</label>
                                  <p id="file-name1" class="file-name"></p>
                                  <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                                </div>
                                <div class="file-input">
                                  <input type="file" id="file1" class="input-file"
                                    onchange="displayImage(this, 'preview1') " name="foto"  accept="image/*">
                                  <label for="file1" class="label">Foto 1</label>
                                  <p id="file-name1" class="file-name"></p>
                                  <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                                </div>
                                <div class="file-input">
                                  <input type="file" id="file1" class="input-file"
                                    onchange="displayImage(this, 'preview1')" name="foto1"  accept="image/*">
                                  <label for="file1" class="label">Foto 2</label>
                                  <p id="file-name1" class="file-name"></p>
                                  <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                                </div>
                                <div class="file-input">
                                  <input type="file" id="file1" class="input-file"
                                    onchange="displayImage(this, 'preview1')" name="foto2">
                                  <label for="file1" class="label">Foto 3</label>
                                  <p id="file-name1" class="file-name"></p>
                                  <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="card-body">
                              <h6 class="fw-bold">Deskripsi Produk</h6>
                              <small>Pastikan deskripsi produk diisi selengkap mungkin agar customer/pembeli mudah
                                mengerti dan mudah menemukan produkmu </small>
                              <textarea class="form-control" name="deskripsi" id="name" cols="30" rows="3" maxlength="150"
                                onkeyup="charCountUpdate(this.value)"></textarea>
                              <p id="charCounts">0/2000</p>
                            </div>
                          </div>
                        </div>
                        <div class="card-body">
                          <button type="submit" class="btn btn-outline-success me-4">Submit</button>
                          <button type="reset" class="btn btn-outline-danger">Reset</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <form method="post" enctype="multipart/form-data">
                    <!-- tampilan mobile -->
                    <div class="card-body d-block d-sm-none">
                      <div class="col-12">
                        <h4>Tambahkan Produk Anda</h4>
                        <div class="col-7 text-end border border-success p-1 rounded ">Produk Tersisa 50/30</div>
                        <div class="card-body mt-3">
                          <h5>Informasi Produk</h5>
                          <p class="p-1 border border-warning rounded">Pastikan produk anda tidak melanggar HAKI</p>
                        </div>
                        <div class="card-body border border-success rounded">
                          <label for="name" class="fw-bold">Nama Produk</label>
                          <p class="mt-3">Nama produk min.50 karakter <br> dan wajib memasukkan nama <br> brand,jenis
                            <br> produk,warna,bahan,atau tipe</p>
                          <textarea class="form-control" name="np" id="name" cols="30" rows="3" maxlength="150"
                            onkeyup="charCountUpdate(this.value)"></textarea>
                          <p id="charCount">0/150</p>
                        </div>
                        <div class="card-body border border-success rounded mt-3">
                          <h6 for="defaultSelect" class="fw-bold">Kategori Produk</h6>
                          <p class="mt-3">Pilihlah kategori yang <br> sesuai dengan produk <br> anda <a href="">Pelajari
                              Selengkapnya</a></p>
                          <div class="mb-3">
                            <select id="defaultSelect" class="form-select" name="kate" required>
                            <option value="Makanan">Makanan</option>
                                  <option value="Minuman">Minuman</option>
                                  <option value="Pakaian">Pakaian</option>
                                  <option value="Bubuk">Bubuk</option>
                            </select>
                          </div>
                          <h6 class="fw-bold">Spesifikasi Produk</h6>
                          <label for="berat" class="mt-2">Berat Produk</label><br>
                          <div class="input-group input-group-merge">
                            <input id="berat" type="text" class="form-control" placeholder="1000" aria-label="1000"
                              aria-describedby="basic-addon33" name="berat"/>
                            <span class="input-group-text mb-3" id="basic-addon33">gram</span>
                          </div>
                          <label for="panjang" class="mt-3">Ukuran Produk</label><br>
                          <div class="input-group input-group-merge mb-2">
                            <span class="input-group-text" id="basic-addon33">Panjang :</span>
                            <input id="panjang" type="text" class="form-control" placeholder="10" aria-label="10"
                              aria-describedby="basic-addon33" name="panjang"/>
                            <span class="input-group-text" id="basic-addon33">cm</span>
                          </div>
                          <div class="input-group input-group-merge mb-2">
                            <span class="input-group-text" id="basic-addon33">Lebar :</span>
                            <input id="lebar" type="text" class="form-control" placeholder="10" aria-label="10"
                              aria-describedby="basic-addon33" name="lebar"/>
                            <span class="input-group-text" id="basic-addon33">cm</span>
                          </div>
                          <div class="input-group input-group-merge mb-2">
                            <span class="input-group-text" id="basic-addon33">Tinggi :</span>
                            <input id="tinggi" type="text" class="form-control" placeholder="10" aria-label="10"
                              aria-describedby="basic-addon33" name="tinggi"/>
                            <span class="input-group-text" id="basic-addon33">cm</span>
                          </div>
                          <label for="stok" class="mt-3">Stok Produk</label>
                          <div class="input-group input-group-merge">
                            <input id="stok" type="text" class="form-control" placeholder="1000" aria-label="1000"
                              aria-describedby="basic-addon33" name="jlh"/>
                            <span class="input-group-text" id="basic-addon33">pcs</span>
                          </div>
                          <div class="row">
                            <p class="mt-4 col-9">Apakah produk anda barang pecah belah ?</p>
                            <div class="form-check form-switch mt-4 col-3">
                              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="belah">
                            </div>
                          </div>
                        </div>
                        <h5 class="mt-5">Dokumentasi Produk</h5>
                        <div class="card-body border border-success rounded mt-3">
                          <h6 class="fw-bold">Video dan Foto Produk</h6>
                          <div class="border border-secondary rounded p-1">
                            <div class="row">
                              <img class="col-2" style="display: inline-block;" width="25" height="15" src=""
                                alt="general-warning-sign" />
                              <small class="col-10">Pastikan foto produk berekstensi JPG,JPEG,PNG dan pastikan berukuran
                                3x4 Untuk video ukuran maks 30 MB dan resolusi maks 1.280x1.280 serta durasi 10-60 detik
                                dan menggunakan format MP4</small>
                            </div>
                          </div>
                          <div class="mt-3">
                            <div class="file-input">
                              <input type="file" id="file1" class="input-file"
                                onchange="displayImage(this, 'preview1') " name="vidi"  accept="video/*">
                              <label for="file1" class="label">Choose a Vide</label>
                              <p id="file-name1" class="file-name"></p>
                              <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                            </div>
                            <div class="file-input">
                              <input type="file" id="file1" class="input-file"
                                onchange="displayImage(this, 'preview1')" name="foto"  accept="image/*">
                              <label for="file1" class="label">Choose a file</label>
                              <p id="file-name1" class="file-name"></p>
                              <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                            </div>
                            <div class="file-input">
                              <input type="file" id="file1" class="input-file"
                                onchange="displayImage(this, 'preview1')" name="foto1"  accept="image/*">
                              <label for="file1" class="label">Choose a file</label>
                              <p id="file-name1" class="file-name"></p>
                              <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                            </div>
                            <div class="file-input">
                              <input type="file" id="file1" class="input-file"
                                onchange="displayImage(this, 'preview1')" name="foto2" accept="image/*">
                              <label for="file1" class="label">Choose a file</label>
                              <p id="file-name1" class="file-name"></p>
                              <img id="preview1" class="preview-image" src="#" alt="Preview Image">
                            </div>
                            
                          </div>
                          <h6 class="fw-bold mt-4">Deskripsi Produk</h6>
                          <small>Pastikan deskripsi produk diisi selengkap mungkin agar customer/pembeli mudah mengerti
                            dan mudah menemukan produkmu </small>
                          <textarea class="form-control" name="deskripsi" id="name" cols="30" rows="3" maxlength="150"
                            onkeyup="charCountUpdate(this.value)"></textarea>
                          <p id="charCounts">0/2000</p>
                        </div>
                        <div class="card-body">
                          <button type="button" class="btn btn-outline-success me-4">Success</button>
                          <button type="button" class="btn btn-outline-success">Success</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              <!-- Footer -->
              <!-- <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer> -->
              <!-- / Footer -->

              <div class="content-backdrop fade"></div>
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
    <script src="../assets/vendor/js/script.js"></script>

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