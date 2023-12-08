<?php
require_once 'function.php';
require 'koneksi.php';

regist();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&family=Dosis:wght@500&display=swap"
    rel="stylesheet">
  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>

  <div class="container">
    <div class="row my-5">
      <div class="col-md-6">
        <div class="image-container d-flex justify-content-center align-items-center h-100">
          <img src="img/lg1.png" alt="" class="img-fluid h-50">
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-container">
          <!-- Your form HTML here -->
          <form autocomplete="off" onsubmit="return checkPassword()" method="post">
            <center>
              <h2>Register</h2>
            </center><br>


            <div class="input-section">
              <label for="UserName-input">Username<span class="required-color">*</span></label>
              <input type="text" placeholder="Enter Your Username" id="UserName-input" name="username"
                autocomplete="off" required />
              <span id="username-error" class="hide required-color error-message">Invalid Input</span>
              <span id="empty-first-name" class="hide required-color error-message"> UserName Cannot Be Empty</span>
            </div>
            <div class="input-section">
              <label for="password">Password <span class="required-color">*</span></label>
              <input type="password" placeholder="Enter Password" id="password" name="password" required />
              <span id="password-error" class="hide required-color error-message">
                Passwords Should Have Letter, Special symbols, Numbers And Length >=
                8
              </span>
              <span id="empty-password" class="hide required-color error-message">
                Password Cannot Be Empty
              </span>
            </div>
            <div class="input-section">
              <label for="confirm_password">Confirm Password <span class="required-color">*</span></label>
              <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm.Password"
                required />
            </div>
            <div class="input-section">
              <label for="name-input">Name<span class="required-color">*</span></label>
              <input type="text" placeholder="Real Name" id="name-input" name="nama" required />
              <span id="first-name-error" class="hide required-color error-message">Invalid Input</span>
              <span id="empty-first-name" class="hide required-color error-message"> Name Cannot Be Empty</span>
            </div>
            <div class="input-section">
              <label for="email">Email <span class="required-color">*</span></label>
              <input type="email" placeholder="Enter Email" id="email" name="email" autocomplete="off" required />
              <span id="email-error" class="hide required-color error-message">
                Invalid Email
              </span>
              <span id="empty-email" class="hide required-color error-message">
                Email Cannot Be Empty
              </span>
            </div>

            <div class="input-section">
              <label for="phone">Phone <span class="required-color">*</span></label>
              <input type="text" placeholder="Enter Phone Number" id="phone" name="telepon" autocomplete="off"
                required />
              <span id="phone-error" class="hide required-color error-message">Phone Number Should Have 14 Digits
              </span>
              <span id="empty-phone" class="hide required-color error-message">
                Phone cannot be empty
              </span>
            </div>
            <div class="input-section">
              <label for="Address-input">Address<span class="required-color">*</span></label>
              <input type="text" placeholder="Enter Your Address" id="Address-input" name="alamat" required />
              <span id="first-name-error" class="hide required-color error-message">Invalid Input</span>
              <span id="empty-first-name" class="hide required-color error-message"> Address Cannot Be Empty</span>
            </div>
            <div class="input-section">
              <label for="usia">Date Of Birth<span class="required-color">*</span></label>
              <input type="date" name="usia" id="usia" required />
              <span id="date-of-birth-error" class="hide required-color error-message">Invalid Input</span>
              <span id="empty-date-of-birth" class="hide required-color error-message"> Cannot Be Empty</span>
            </div>

            <div class="input-section">
              <label for="select2-provinsi">Provinsi<span class="required-color">*</span></label>
              <select class="form-control w-90" id="select2-provinsi" name="provinsi" required>
                <!-- Options will be dynamically added using JavaScript -->
                <option value="" disabled selected>- Select Provinsi -</option>
              </select>
            </div>


            <div class="input-section">
              <label for="select2-kabupaten">Kab/Kota<span class="required-color">*</span></label>
              <select class="form-control w-90" id="select2-kabupaten" name="kota" required>
                <!-- Options will be dynamically added using JavaScript -->
                <option value="" disabled selected>- Select Kota -</option>
              </select>
            </div>


            <div class="input-section">

              <div id="error-message" class="error-message hide" style="color: #ff4747;">Maximum image size is 500KB
              </div>
              <br>
              <div id="image-preview" class="image-preview">
                <center>
                  <input type="submit" name="submit" id="submit-button" value="Sign Up">
                </center>
              </div>
            </div>
        </div>
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
  <script>
    function checkPassword() {
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirm_password").value;


      if (password !== confirmPassword) {
        alert("Passwords do not match. Please try again.");
        return false;
      }
      return true;
    }
  </script>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(response => response.json())
    .then(provinces => {
      var data = provinces;
      var tampung = '<option>- Select Provinsi -</option>';
      document.getElementById('select2-provinsi').innerHTML = '<option>- Select Provinsi -</option>';

      data.forEach(element => {
        tampung +=
          `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
      });
      document.getElementById('select2-provinsi').innerHTML = tampung;
    });
</script>
<script>
  const selectProvinsi = document.getElementById('select2-provinsi');

  selectProvinsi.addEventListener('change', (e) => {
    var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
      .then(response => response.json())
      .then(regencies => {
        var data = regencies;
        var tampung = '<option>Pilih</option>';

        document.getElementById('select2-kabupaten').innerHTML = '<option>Pilih</option>';
        data.forEach(element => {
          tampung +=
            `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
        });
        document.getElementById('select2-kabupaten').innerHTML = tampung;
      });
  });
</script>



</html>