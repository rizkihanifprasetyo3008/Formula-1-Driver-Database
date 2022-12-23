<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./popup.css?v=<?php echo time(); ?>">
    <!-- LINK FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- END LINK FONT AWESOME -->
    <!-- Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- END Box Icons -->
    <title>Sukses</title>
</head>

<body>
    <section class="nav">
        <div class="left">
            <a href="#">
                <h2>Welcome <span>Admin!</span></h2>
            </a>
        </div>
        <div class="right">
            <ul>
                <li><a href="index.php">Data Driver</a></li>
                <li><a href="#">Account Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </section>
    <div class="container_popup">
        <!-- <button type="submit" class="btn_popup" onclick="openPopup()">Submit</button> -->
        <div class="popup" id="popup">
            <i class="fa-solid fa-trash"></i>
            <h2>Sukses Menghapus Data!</h2>
            <p>Profil Data Driver Formula 1 Telah berhasil dihapus!</p>
            <a href="./index.php"><button type="button">Kembali Ke Halaman Utama</button></a>
        </div>
    </div>

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