<?php
include 'koneksi.php';
include 'function.php';

registe();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Registrasi</legend>
            <p><label>Nama Toko:</label>
                <input type="text" name="nama_toko" />
            </p>
            <p><label>Nama Penjual:</label>
                <input type="text" name="nama_penjual" />
            </p>
            <p><label>Password:</label>
                <input type="password" name="password" />
            </p>
            <p><label>Foto Toko:</label>
                <input required type="file" name="foto_toko" id="" accept="image/*">
            <p><label>Telepon:</label>
                <input type="text" name="telepon" />
            </p>
            <p><label>Email:</label>
                <input type="text" name="email" />
            </p>
            <p><label>Provinsi:</label>
                <select name="provinsi" id="provinsi">
                    <option>pilih</option>
                </select>
            </p>
            <p><label>Kab/Kota:</label>
                <select name="kota" id="kota">
                    <option>pilih</option>
                </select>
            </p>
            <p><label>Alamat:</label>
                <input type="text" name="alamat" />
            </p>
            <p><label>Slogan:</label>
                <input type="text" name="slogan" />
            </p>
            <p><label>Deskripsi:</label>
                <input type="text" name="deskripsi" />
            </p>
            <p><input type="submit" name="submit" value="Register" /></p>
        </fieldset>
    </form>
    <script>
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
            .then(response => response.json())
            .then(provinces => {
                var data = provinces;
                var tampung = '<option>Pilih</option>';
                document.getElementById('provinsi').innerHTML = '<option>Pilih</option>';

                data.forEach(element => {
                    tampung +=
                        `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('provinsi').innerHTML = tampung;
            });
    </script>
    <script>
        const selectProvinsi = document.getElementById('provinsi');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then(response => response.json())
                .then(regencies => {
                    var data = regencies;
                    var tampung = '<option>Pilih</option>';

                    document.getElementById('kota').innerHTML = '<option>Pilih</option>';
                    data.forEach(element => {
                        tampung +=
                            `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById('kota').innerHTML = tampung;
                });
        });


    </script>
</body>

</html>