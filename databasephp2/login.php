<?php

session_start();
if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}
$db = mysqli_connect("localhost", "root", "", "formula1_database");

if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, " SELECT * FROM admin1 WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["id"] = $row["id"];
        $_SESSION["nama"] = $row["nama"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["no_induk"] = $row["no_induk"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["confirm"] = $row["confirm"];
        $_SESSION["foto_profil"] = $row["foto_profil"];
        if(password_verify($password, $row["password"])){
            // set session
            $_SESSION["login"] = true;
            header('Location: index.php');
            exit;
        }
    }
    $error = true;
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
    <title>Halaman Login Admin</title>
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
        <div class="container_popup">
            <form action="" class="registrasi_form_wrapper" method="POST">
                <h2 class="registrasi_title" style="color: white;">Login Akun Admin</h2>
                <div class="form_group">
                    <label for="username">Username</label>
                    <br>
                    <input type="text" id="username" name="username" required placeholder="isi username anda...">
                </div>
                <div class="form_group">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" id="password" name="password" required placeholder="isi password akun...">
                </div>
                <?php if(isset($error)): ?>
                    <p style="color: white;">* Username/Password Salah</p>
                <?php endif; ?>
                <div class="popup" id="popup">
                    <i class="fa-solid fa-check-to-slot"></i>
                    <h2 id="popup_text">Konfirmasi</h2>
                    <p>Anda yakin ingin Login akun anda? silahkan dicek lagi username dan password yang telah dimasukkan.</p>
                    <a href="#"><button type="submit" name="login" onclick="closePopup()" class="btn_confirm">Ya</button></a>
                    <a href="#"><button type="button" onclick="closePopup()" class="btn_confirm">Periksa Kembali Data</button></a>
                </div>
            </form>
            <div class="form_group_btn">
                <a href="#popup_text"><button type="button" class="registrasi_btn" onclick="openPopup()">Login Akun</button></a>
                <a href="registrasi.php" class="checkakun">Belum Punya akun? Buat Akun Disini</a>
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
    <style>
        .registrasi .registrasi_form_wrapper{
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding-top: 40px;
            padding-left: 20px;
            padding-right: 20px;
            /* background-color: aqua; */
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .registrasi .registrasi_form_wrapper .form_group label{
            text-transform: uppercase;
            color: white;
        }
        .registrasi  .form_group_btn{
            /* background-color: lawngreen; */
            padding-left: 50px;
            padding-right: 50px;
            display: flex;
        }
    </style>

</body>

</html>