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

//Pagination
// limit untuk membatasi data yang ditampilkan di database LIMIT 1,3
// membulatkan angka desimal round,floor,ceil
$jumlahdataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM info_driver"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$page_aktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awaldata = ($jumlahdataperhalaman * $page_aktif) - $jumlahdataperhalaman;



$data_driver = query("SELECT * FROM info_driver LIMIT $awaldata, $jumlahdataperhalaman");
$cari_data = query("SELECT * FROM info_driver ORDER BY id DESC LIMIT $awaldata, $jumlahdataperhalaman");
// ambil data driver dari objek result (fetch)
// mysqli_fetch_row() = mengembalikan array, yg tipe arraynya numerik
// mysqli_fetch_assoc() = mengembalikan array, tipenya asosiatif
// mysqli_fetch_array() = mengembalikan array, kedua tipe *kekurangan jika database berisi array numerik & assosiatif jadi double
// mysqli_fetch_object() = mengembalikan object

// $driver = mysqli_fetch_assoc($result)
// Search Button
if(isset($_POST["cari"])){
    $data_driver = cari($_POST["keyword"]);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
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
                <h2>Welcome <span><?= $username["username"]; ?></span></h2>
            </a>
        </div>
        <div class="right">
            <ul>
                <li><a href="index.php">Data Driver</a></li>
                <li><a href="profil.php">Account Profile<img src="img/<?= $foto_profil["foto_profil"]; ?>" alt=""></a></li>
            </ul>
        </div>
    </section>
    <section class="tabel_driver">
        <h2>Formula 1 Driver Database</h2>
        <div class="search">
            <form action="" method="POST">
            <!-- <label>Cari Data Driver</label>  -->
            <br>
            <input type="text" placeholder="Cari Nama Driver....." name="keyword" autocomplete="off" id="keyword">
            <button type="submit" name="cari" class="btn-search" id="tombol-cari">Search</button>
            </form>
            <select name="order" id="order" class="pilihan">
                <option selected class="choose">--Urutkan Berdasarkan--</option>
                <option value="ascending">Ascending</option>
                <option value="descending">Descending</option>
            </select>
        </div>
        <div class="container" id="container">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Driver</th>
                    <th>Tim Konstruktor</th>
                    <th>Asal Negara</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>World Champions</th>
                    <th>photo</th>
                    <th>Actions</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($data_driver as $row) : ?>
                    <tr class="isi_tabel">
                        <th><?= $i; ?></th>
                        <th><?= $row["Nama_Driver"]; ?></th>
                        <th><?= $row["Tim_Konstruktor"]; ?></th>
                        <th><?= $row["Asal_Negara"]; ?></th>
                        <th><?= $row["Tempat_Lahir"]; ?></th>
                        <th><?= $row["Tanggal_Lahir"]; ?></th>
                        <th><?= $row["Umur"]; ?></th>
                        <th><?= $row["World_Champions"]; ?></th>
                        <th><img src="img/<?= $row["photo"]; ?>"></th>
                        <th>
                            <a href="./edit.php?id=<?= $row["id"]; ?>">Edit</a> | <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda Yakin ingin Menghapus Data?');" class="delete">Delete</a>
                        </th>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- Navigasi -->
        <div class="tambahdata" id="halaman_hilang">
            <?php if($page_aktif > 1) : ?>
                <a href="?page=<?= $page_aktif -1;?>">&laquo;</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $jumlahhalaman; $i++) : ?>
                <?php if( $i == $page_aktif) : ?>
                <a class="halaman" href="?page=<?= $i;?>" style=" color:black; font-weight: bold; text-decoration:underline;"><?= $i; ?></a>
                <?php else : ?>
                    <a class="halaman" href="?page=<?= $i;?>"><?= $i; ?></a>
                <?php endif;?>
            <?php endfor; ?>
            <?php if($page_aktif < $jumlahhalaman) : ?>
                <a href="?page=<?= $page_aktif + 1;?>">&raquo;</a>
            <?php endif; ?>
        </div>
        <br>
        <div class="tambahdata">
            <a href="tambah.php">Tambah Data Driver + </a>
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
            <p>&#169; HanssCreative All Rights Reserved.</p>
        </div>
    </footer>


</body>
<style>
    .halaman {
        background-color: red;
        color: black;
        padding: 10px 10px;
    }
    .btn-search:hover{
        background-color: white;
        color: black;
        transition: .3s all ease-in-out;
        /* border: 1px solid black; */
        cursor: pointer;
    }
</style>
<script src="./script.js"></script>

</html>