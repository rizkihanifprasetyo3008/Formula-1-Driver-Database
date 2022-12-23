<?php
require 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
// Ambil data dari login session 
$nama = getinfoadmin($_SESSION["id"]);
$username = getinfoadmin($_SESSION["id"]);
$foto_profil = getinfoadmin($_SESSION["id"]);
$no_induk = getinfoadmin($_SESSION["id"]);

// $db = mysqli_connect("localhost","root","","formula1_database");
// Ambil data di url
$id = $_GET["id"];


$data_driver = query("SELECT * FROM info_driver WHERE id = $id")[0];



if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
            <script>
                document.location.href = 'sukses.php';
            </script>
        ";
    } else {
        echo "
            <script>
                document.location.href = 'gagal.php';
            </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./popupanimated.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./registrasi.css?v=<?php echo time(); ?>">
    <!-- LINK FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- END LINK FONT AWESOME -->
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- END Box Icons -->
    <title>Database Formula 1</title>
</head>

<body>
    <section class="nav">
        <div class="left">
            <a href="#">
                <h2>Welcome <span><?= $username["username"];?></span></h2>
            </a>
        </div>
        <div class="right">
            <ul>
                <li><a href="index.php">Data Driver</a></li>
                <li><a href="profil.php">Account Profile<img src="img/<?= $foto_profil["foto_profil"] ;?>" alt=""></a></li>
            </ul>
        </div>
    </section>
    <section class="tabel_driver">
        <div class="container_popup">
            <h2>Form Edit Data Formula 1 Driver</h2>
            <div class="tambahdata">
                <a href="index.php"><i class="fa-solid fa-house"></i> Kembali Ke Halaman Utama </a>
            </div>
            <form method="POST" class="form_tambahdata" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $data_driver['id'] ?>">
                <input type="hidden" name="photo_lama" id="photo_lama" value="<?= $data_driver['photo'] ?>">
                <ul>
                    <li>
                        <label class="form_tambahdata_Text">Nama Driver :</label>
                        <br>
                        <input type="text" name="Nama_Driver" id="Nama_Driver" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Nama_Driver'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Tim Konstruktor :</label>
                        <br>
                        <input type="text" name="Tim_Konstruktor" id="Tim_Konstruktor" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Tim_Konstruktor'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Asal Negara :</label>
                        <br>
                        <input type="text" name="Asal_Negara" id="Asal_Negara" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Asal_Negara'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Tempat Lahir :</label>
                        <br>
                        <input type="text" name="Tempat_Lahir" id="Tempat_Lahir" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Tempat_Lahir'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Tanggal Lahir :</label>
                        <br>
                        <input type="text" name="Tanggal_Lahir" id="Tanggal_Lahir" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Tanggal_Lahir'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Umur :</label>
                        <br>
                        <input type="text" name="Umur" id="Umur" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Umur'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Debut Balapan :</label>
                        <br>
                        <input type="text" name="Debut_Balapan" id="Debut_Balapan" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Debut_Balapan'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">World Champions :</label>
                        <br>
                        <input type="text" name="World_Champions" id="World_Champions" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['World_Champions'] ?>">
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Nomer Pembalap :</label>
                        <br>
                        <input type="text" name="Nomer_Pembalap" id="Nomer_Pembalap" class="form_tambahdata_input" placeholder="input here..." required value="<?= $data_driver['Nomer_Pembalap'] ?>">
                    </li>
                    <li>
                        <div class="separate">
                            <label for="photo">Foto Profil Akun :</label>
                            <br>
                            <input type="file" id="photo" name="photo">
                            <br>
                            <label for="photo" class="label_profil" style="width: 50%; height: 50px;"><i class='bx bxs-camera'></i> Pilih Photo</label>
                            <img src="img/<?= $data_driver['photo']; ?>" alt="" width="50%">
                        </div>
                    </li>
                    <li>
                        <label class="form_tambahdata_Text">Deskripsi :</label>
                        <br>
                        <textarea name="Deskripsi" id="Deskripsi" class="textarea_form" placeholder="input here..." required></textarea>
                    </li>
                    <li>
                        <div class="popup" id="popup">
                            <i class="fa-solid fa-check-to-slot"></i>
                            <h2>Apakah anda yakin ingin mengedit data?</h2>
                            <p>Data yang telah diedit akan langsung dimasukkan ke dalam database, pastikan semua sudah benar</p>
                            <button class="tombol" type="submit" name="submit" onclick="closePopup()">Ya</button>
                            <button class="tombol" type="button" name="submit2" onclick="closePopup()">Periksa Kembali Data</button>
                        </div>
                        <a href="#Nama_Driver"><button type="button" name="submit1" onclick="openPopup()">Edit Data</button></a>
                    </li>
                </ul>
            </form>
        </div>
    </section>
    <footer>
        <div class="wrapper">
            <div class="footer_left">
                <i class="fa-solid fa-flag-checkered"></i>
                <h2>Formula 1 Driver Profile</h2>
            </div>
            <div class="footer_right">
                <a href="#">
                    <i class='bx bxl-instagram'></i>
                </a>
                <a href="#">
                    <i class='bx bxl-twitter'></i>
                </a>
                <a href="#">
                    <i class='bx bxl-tiktok'></i>
                </a>
                <a href="#">
                    <i class='bx bxl-youtube'></i>
                </a>
            </div>
        </div>
        <div class="copyright">
            <p>&#169; HansCreative All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        let popup = document.getElementById('popup');

        function openPopup() {
            popup.classList.add("open-popup");
        }

        function closePopup() {
            popup.classList.remove("open-popup");
        }
    </script>
    <style>
        .container_popup .popup .tombol {
            width: 100%;
        }
    </style>


</body>

</html>