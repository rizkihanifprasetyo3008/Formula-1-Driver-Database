<?php
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$db = mysqli_connect("localhost", "root", "", "formula1_database");
// Ambil data dari login session 

$id = getinfoadmin($_SESSION["id"]);
$nama = getinfoadmin($_SESSION["id"]);
$username = getinfoadmin($_SESSION["id"]);
$foto_profil = getinfoadmin($_SESSION["id"]);
$no_induk = getinfoadmin($_SESSION["id"]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./popup.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./profil.css?v=<?php echo time(); ?>">
    <!-- LINK FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- END LINK FONT AWESOME -->
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- END Box Icons -->
    <title>Profil Akun</title>
</head>

<body>
    <section class="nav">
        <div class="left">
            <a href="#">
                <h2>Welcome <span><?= $username["username"]; ?></span></h2>
            </a>
        </div>
        <div class="right">
            <ul>
                <li><a href="index.php">Data Driver</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </section>
    <section class="profil_admin">
        <div class="profil_admin_content">
            <h2>Profil Akun Admin</h2>
            <img src="img/<?= $foto_profil["foto_profil"]; ?>" alt="">
            <ul>
                <li>
                    <label for="nama" class="judul">Nama Lengkap:</label>
                    <br>
                    <label for="nama" class="isi"><?= $nama["nama"]; ?></label>
                </li>
                <li>
                    <label for="username" class="judul">Username:</label>
                    <br>
                    <label for="username" class="isi"><?= $username["username"]; ?></label>
                </li>
                <li>
                    <label for="no_induk" class="judul">Nomor Induk:</label>
                    <br>
                    <label for="no_induk" class="isi"><?= $no_induk["no_induk"]; ?></label>
                </li> 
                <div class="feature">
                <li class="fitur">
                    <a href="editprofil.php?id=<?= $id["id"];?>" class="edit">edit profile <i class="fa-solid fa-user-pen"></i></a>
                </li>
                <li>
                    <a href="logout.php" class="logout">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </li>
                </div>
            </ul>
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


</body>

</html>