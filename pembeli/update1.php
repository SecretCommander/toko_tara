<?php
include 'koneksi.php';
include 'function.php';

$id         = $_GET['id'];

$pembeli    = mysqli_query($conn, "select * from pembeli where id_pembeli='$id'");
$row        = mysqli_fetch_array($pembeli);

update();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Edit Data Mahasiswa</title>
</head>

<body>
    <form method="post">
        <input type="hidden" value="<?php echo $row['id_pembeli']; ?>" name="id_pembeli">
        <table>
            <tr>
                <td>USERNAME</td>
                <td><input type="text" value="<?php echo $row['username']; ?>" name="username"></td>
            </tr>

            <tr>
                <td>NAMA PEMBELI</td>
                <td><input type="text" value="<?php echo $row['nama_pembeli']; ?>" name="nama_pembeli"></td>
            </tr>

            <tr>
                <td>PASSWORD</td>
                <td><input type="text" value="<?php echo $row['password']; ?>" name="password"></td>
            </tr>

            <tr>
                <td>TELEPON</td>
                <td><input type="text" value="<?php echo $row['telepon']; ?>" name="telepon"></td>
            </tr>

            <tr>
                <td>EMAIL</td>
                <td><input type="text" value="<?php echo $row['email']; ?>" name="email"></td>
            </tr>

            <tr>
                <td>ALAMAT</td>
                <td><input type="text" value="<?php echo $row['alamat']; ?>" name="alamat"></td>
            </tr>

            <tr>
                <td>tgl_lahir</td>
                <td><input type="date" value="<?php echo $row['tgl_lahir']; ?>" name="usia"></td>
            </tr>

            <tr>
                <td>Provinsi</td>
                <td><select  name="provinsi" id="provinsi">
                    <option>pilih</option>
                </select></td>
            </tr>

            <tr>
                <td>Kota</td>
                <td><select  name="kota" id="kota">
                    <option>pilih</option>
                </select></td>
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
                var selectedProvinsi = "<?php echo $row['provinsi_p'];?>";
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
    const selectedKota = "<?php echo $row['kota_p'];?>";
    const selectedProvinsi = "<?php echo $row['provinsi_p'];?>";

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