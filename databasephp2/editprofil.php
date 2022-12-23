<?php
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


  
// Ambil data dari login session 
$nama = getinfoadmin($_SESSION["id"]);
$username = getinfoadmin($_SESSION["id"]);
$foto_profil = getinfoadmin($_SESSION["id"]);
$no_induk = getinfoadmin($_SESSION["id"]);
$password = getinfoadmin($_SESSION["id"]);
$confirm = getinfoadmin($_SESSION["id"]);

$db = mysqli_connect("localhost","root","", "formula1_database");
$id = $_GET["id"];

$editadmin = query("SELECT * FROM admin1 WHERE id = $id")[0];

function editadmin($data){
    global $db;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $no_induk = htmlspecialchars($data["no_induk"]);

    $query = "UPDATE admin1 SET
                nama = '$nama',
                username = '$username',
                no_induk = '$no_induk'
                WHERE id = $id;
                ";
    mysqli_query($db,$query);
    return mysqli_affected_rows($db);
}

if(isset($_POST["submit"])){
    if(editadmin($_POST) > 0){
        echo "
        <script>
            alert('Profil Berhasil di edit');
            document.location.href = 'profil.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Profil Gagal di edit');
            document.location.href = 'editprofil.php';
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
    <link rel="stylesheet" href="./popup.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./popupanimated.css?v=<?php echo time(); ?>">
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
                <h2 id="title">Welcome <span><?= $username["username"]; ?></span></h2>
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
        <form class="profil_admin_content" enctype="multipart/form-data" method="POST" action="">
            <h2>Profil Akun Admin</h2>
            <img src="img/<?= $foto_profil["foto_profil"]; ?>" alt="">
            <input type="hidden" id="id" name="id" value="<?= $editadmin["id"] ;?>" >
            <ul>
                <li>
                    <label for="nama" class="judul">Nama Lengkap:</label>
                    <br>
                    <input type="text" name="nama" class="edit_input" required value="<?= $nama["nama"]; ?>">
                </li>
                <li>
                    <label for="username" class="judul">Username:</label>
                    <br>
                    <input type="text" name="username" class="edit_input" required value="<?= $username["username"]; ?>">
                </li>
                <li>
                    <label for="no_induk" class="judul">Nomor Induk:</label>
                    <br>
                    <input type="text" name="no_induk" class="edit_input" required value="<?= $no_induk["no_induk"]; ?>">
                </li>
                <!-- <li>
                    <label for="photo" class="judul">Foto Profil Akun :</label>
                    <input type="file" id="photo" name="photo">
                    <br>
                    <label for="photo" class="label_profil" style="width: 50%; height: 50px;"><i class='bx bxs-camera'></i> Pilih Photo</label>
                </li> -->
                <div class="feature">
                    <div class="popup" id="popup">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <h2>Apakah anda yakin ingin mengedit profil?</h2>
                        <p>Data yang telah diedit akan langsung dimasukkan ke dalam database, pastikan semua sudah benar</p>
                        <button class="tombol" type="submit" name="submit" onclick="closePopup()">Ya</button>
                        <button class="tombol" type="button" name="submit2" onclick="closePopup()">Periksa Kembali Data</button>
                    </div>
                    <a href="#title"><button type="button" name="submit1" onclick="openPopup()" class="btn-profil">Edit Profil <i class="fa-solid fa-user-pen"></i></button></a>
                    <a href="profil.php"><button type="button" name="submit1" class="btn-profil">kembali <i class="fa-solid fa-arrow-right-from-bracket"></i></button></a>
                </div>
            </ul>
        </form>
    </section>
    <style>
        .open-popup {
            top: 50%;
        }

        .profil_admin .profil_admin_content .btn-profil {
            padding: 5px 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: black;
            color: white;
        }

        .profil_admin .profil_admin_content .btn-profil:hover {
            cursor: pointer;
            color: black;
            background-color: transparent;
            border: 1px solid black;
            transition: .3s all ease-in-out;
        }

        .popup .tombol {
            background-color: black;
            color: white;
            margin-bottom: 5px;
        }

        .btn-profil i {
            margin-left: 5px;
        }
    </style>


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
<script>
    let popup = document.getElementById('popup');

    function openPopup() {
        popup.classList.add("open-popup");
    }

    function closePopup() {
        popup.classList.remove("open-popup");
    }
</script>

</html>