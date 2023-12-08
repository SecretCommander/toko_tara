<?php
include 'koneksi.php';
include 'function.php';
$id = $_GET['id'];

$penjual = mysqli_query($conn, "select * from penjual where id_penjual='$id'");
$row = mysqli_fetch_array($penjual);

update();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Edit Pembeli</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $row['id_penjual']; ?>" name="id_penjual">
        <table>
            <tr>
                <td>Nama Toko</td>
                <td><input type="text" value="<?php echo $row['nama_toko']; ?>" name="nama_toko"></td>
            </tr>

            <tr>
                <td>Nama Penjual</td>
                <td><input type="text" value="<?php echo $row['nama_penjual']; ?>" name="nama_penjual"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="text" value="<?php echo $row['password']; ?>" name="password"></td>
            </tr>

            <tr>
                <td><img src="img/<?php echo $row['foto_toko'] ?>" style="width:100px;"></td>
                <td>FOTO PRODUK</td>
                <td><input type="file" value="<?php echo $row['foto_toko']; ?>" name="foto_toko" accept="image/*"></td>
            </tr>

            <tr>
                <td>Telepon</td>
                <td><input type="text" value="<?php echo $row['telepon']; ?>" name="telepon"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="text" value="<?php echo $row['email']; ?>" name="email"></td>
            </tr>

            <tr>
                <td>Provinsi:</td>
                <td><select name="provinsi" id="provinsi">
                        <option>pilih</option>
                    </select></td>
            </tr>

            <tr>
                <td>Kab/Kota:</td>
                <td><select name="kota" id="kota">
                        <option>pilih</option>
                    </select></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td><input type="text" value="<?php echo $row['alamat']; ?>" name="alamat"></td>
            </tr>

            <tr>
                <td>Slogan</td>
                <td><input type="text" value="<?php echo $row['slogan']; ?>" name="slogan"></td>
            </tr>

            <tr>
                <td>Deskripsi</td>
                <td><input type="text" value="<?php echo $row['deskripsi']; ?>" name="deskripsi"></td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" value="simpan">Update Data</button></td>
            </tr>

        </table>
    </form>
    <script>
        fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
            .then(response => response.json())
            .then(provinces => {
                var data = provinces;
                var tampung = '<option>Pilih</option>';


                data.forEach(element => {
                    var selectedProvinsi = "<?php echo $row['provinsi']; ?>";
                    var selectedp = element.name == selectedProvinsi ? 'selected' : '';
                    tampung +=
                        `<option data-reg="${element.id}" value="${element.name}" ${selectedp}>${element.name}</option>`;
                });
                document.getElementById('provinsi').innerHTML = tampung;

                document.getElementById('provinsi').dispatchEvent(new Event('change'));


            });
    </script>
    <script>

        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kota');
        const selectedKota = "<?php echo $row['kota']; ?>";
        const selectedProvinsi = "<?php echo $row['provinsi']; ?>";

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
                });
        });


    </script>
</body>

</html>