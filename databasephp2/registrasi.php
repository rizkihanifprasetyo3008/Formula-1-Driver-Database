<?php

require 'functions.php';

if( isset($_POST["registrasi"])){
    if(registrasi($_POST) > 0) {
        echo "
        <script>
            document.location.href = 'suksesregister.php';
        </script>
            ";
    }else{
        echo "
        <script>
            document.location.href = 'gagalregister.php';
        </script>
            ";
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
    <link rel="stylesheet" href="./registrasi.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./popupanimated.css?v=<?php echo time(); ?>">
    <!-- LINK FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- END LINK FONT AWESOME -->
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- END Box Icons -->
    <title>Halaman Registrasi Admin</title>
</head>

<body>
    <section class="nav">
        <div class="left">
            <a href="#">
                <h2>Formula 1 <span>Database</span></h2>
            </a>
        </div>
        <!-- <div class="right">
            <ul>
                <li><a href="index.php">Data Driver</a></li>
                <li><a href="#">Account Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div> -->
    </section>
    <section class="registrasi">
        <h2 class="registrasi_title">Registrasi Akun Admin</h2>
        <div class="container_popup">
            <form action="" class="registrasi_form_wrapper" method="POST" enctype="multipart/form-data">
                <div class="form_group">
                    <label for="nama">Nama Lengkap :</label>
                    <br>
                    <input type="text" id="nama" name="nama" required placeholder="isi nama anda...">
                </div>
                <div class="form_group">
                    <label for="username">Username :</label>
                    <br>
                    <input type="text" id="username" name="username" required placeholder="isi username akun...">
                </div>
                <div class="form_group">
                    <label for="no_induk">Nomor Induk :</label>
                    <br>
                    <input type="text" id="no_induk" name="no_induk" required placeholder="isi nomor induk...">
                </div>
                <div class="form_group">
                    <label for="password">Password Akun :</label>
                    <br>
                    <input type="password" id="password" name="password" required placeholder="isi password akun...">
                </div>
                <div class="form_group">
                    <label for="confirm">Konfirmasi Password :</label>
                    <br>
                    <input type="password" id="confirm" name="confirm" required placeholder="isi konfirmasi password...">
                </div>
                <div class="form_group">
                    <div class="flex">
                        <label for="foto_profil">Foto Profil Akun :</label>
                        <input type="file" id="foto_profil" name="foto_profil" placeholder="isi konfirmasi password...">
                        <label for="foto_profil" class="label_profil"><i class='bx bxs-camera'></i> Pilih Photo</label>
                    </div>
                </div>
                <div class="popup" id="popup">
                    <i class="fa-solid fa-check-to-slot"></i>
                    <h2 id="popup_text">Konfirmasi</h2>
                    <p>Anda yakin ingin mendaftarkan akun anda? silahkan dicek lagi data yang telah dimasukkan.</p>
                    <a href="#"><button type="submit" name="registrasi" onclick="closePopup()" class="btn_confirm">Ya</button></a>
                    <a href="#"><button type="button" onclick="closePopup()" class="btn_confirm">Periksa Kembali Data</button></a>
                </div>
            </form>
            <div class="form_group_btn">
                <a href="#popup_text"><button type="submit" class="registrasi_btn" onclick="openPopup()">Daftarkan Akun</button></a>
                <a href="login.php" class="checkakun">Sudah Punya akun? Login Disini</a>
            </div>
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
        .open-popup {
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%)scale(1);

        }
        .registrasi .popup .btn_confirm{
            margin-bottom: 5px;
            background-color: black;
            color: white;
            width: 50%;
        }
        .registrasi .popup .btn_confirm:hover{
            color: black;
            background-color: transparent;
            border: 1px solid black;
        }
    </style>

</body>

</html>