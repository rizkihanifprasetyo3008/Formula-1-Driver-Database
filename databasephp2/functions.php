<?php
// Koneksi Database
// mysqli_connect("nama host" , "username" ,"password", "nama database")
$db = mysqli_connect("localhost", "root", "", "formula1_database");


function query($query){
    GLOBAL $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
    
}

function tambah($data){
    GLOBAL $db;
    $Nama_Driver = htmlspecialchars($data["Nama_Driver"]);
    $Tim_Konstruktor = htmlspecialchars($data["Tim_Konstruktor"]);
    $Asal_Negara = htmlspecialchars($data["Asal_Negara"]);
    $Tempat_Lahir = htmlspecialchars($data["Tempat_Lahir"]);
    $Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
    $Umur = htmlspecialchars($data["Umur"]);
    $Debut_Balapan = htmlspecialchars($data["Debut_Balapan"]);
    $World_Champions = htmlspecialchars($data["World_Champions"]);
    $Nomer_Pembalap = htmlspecialchars($data["Nomer_Pembalap"]);

    // $photo = htmlspecialchars($data["photo"]);
    $photo = upload();
    if (!$photo ){
        return false;
    }

    $Deskripsi = htmlspecialchars($data["Deskripsi"]);

    $query = "INSERT INTO info_driver
    VALUES
    ('','$Nama_Driver','$Tim_Konstruktor','$Asal_Negara','$Tempat_Lahir','$Tanggal_Lahir','$Umur','$Debut_Balapan','$World_Champions', '$Nomer_Pembalap', '$photo','$Deskripsi')
    ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function delete($id){
    GLOBAL $db;
    mysqli_query($db, "DELETE FROM info_Driver WHERE id = $id");
    return mysqli_affected_rows($db);
}
function edit($data){
    GLOBAL $db;


    $id = $data["id"];
    $Nama_Driver = htmlspecialchars($data["Nama_Driver"]);
    $Tim_Konstruktor = htmlspecialchars($data["Tim_Konstruktor"]);
    $Asal_Negara = htmlspecialchars($data["Asal_Negara"]);
    $Tempat_Lahir = htmlspecialchars($data["Tempat_Lahir"]);
    $Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
    $Umur = htmlspecialchars($data["Umur"]);
    $Debut_Balapan = htmlspecialchars($data["Debut_Balapan"]);
    $World_Champions = htmlspecialchars($data["World_Champions"]);
    $Nomer_Pembalap = htmlspecialchars($data["Nomer_Pembalap"]);
    $photo_lama = $data["photo_lama"];
    // $photo = htmlspecialchars($data["photo"]);
    // cek user pilih gambar baru atau tidak
    if($_FILES['photo']['error'] === 4){
        $photo = $photo_lama;
    }else{
        $photo = upload();
    }
    $Deskripsi = htmlspecialchars($data["Deskripsi"]);

    $query = "UPDATE info_driver SET
                Nama_Driver = '$Nama_Driver',
                Tim_Konstruktor = '$Tim_Konstruktor',
                Asal_Negara = '$Asal_Negara',
                Tempat_Lahir = '$Tempat_Lahir',
                Tanggal_Lahir = '$Tanggal_Lahir',
                Umur = '$Umur',
                Debut_Balapan = '$Debut_Balapan',
                World_Champions = '$World_Champions',
                Nomer_Pembalap = '$Nomer_Pembalap',
                photo = '$photo',
                Deskripsi = '$Deskripsi'
                WHERE id = $id
                ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function upload(){
    $namafile = $_FILES['photo']['name'];
    $ukuranfile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpname = $_FILES['photo']['tmp_name'];

    // check apakah ada gambar yang diupload
    // 4 adalah untuk cek ada gambar yg diupload atau tidak

    if($error === 4){
        echo "
            <script>
                alert('Photo Driver Wajib Diisi!');
            </script>
        ";
        return false;
    }

    // check apakah file yang diupload adalah gambar
    // explode untuk memecah string jadi array, ex  (rizki.jpg => ['rizki','jpg']) 
    // end untuk mengambil nilai dalam sebuah array yaitu index terakhir.
    // strtolower untuk mengubah gambar jadi huruf kecil.
    // in array untuk mengecek string dalam sebuah array
    $ekstensi_gambar_benar = ['jpg','jpeg','png'];
    $ekstensi_gambar = explode('.', $namafile);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if(!in_array($ekstensi_gambar, $ekstensi_gambar_benar)){
        echo " 
        <script>
            alert('File Yang Di Upload Wajib PNG/JPG/JPEG !');
        </script>
        ";
        return false;
    }
    //check ukuran gambar
    if($ukuranfile > 10000000){
        echo " 
        <script>
            alert('File Yang Di Upload Terlalu Besar !');
        </script>
        ";
        return false;
    }
    // cegah agar nama file gambar tak duplikat
    $namafile_baru = uniqid();
    $namafile_baru .= '.';
    $namafile_baru .= $ekstensi_gambar;
    // Setelah Validasi, gambar bisa diupload

    move_uploaded_file($tmpname,'img/' . $namafile_baru);
    return $namafile_baru;

}
function uploadregis(){
    $namafile = $_FILES['foto_profil']['name'];
    $ukuranfile = $_FILES['foto_profil']['size'];
    $error = $_FILES['foto_profil']['error'];
    $tmpname = $_FILES['foto_profil']['tmp_name'];

    // check apakah ada gambar yang diupload
    // 4 adalah untuk cek ada gambar yg diupload atau tidak

    if($error === 4){
        echo "
            <script>
                alert('Photo Admin Wajib Diisi!');
            </script>
        ";
        return false;
    }

    // check apakah file yang diupload adalah gambar
    // explode untuk memecah string jadi array, ex  (rizki.jpg => ['rizki','jpg']) 
    // end untuk mengambil nilai dalam sebuah array yaitu index terakhir.
    // strtolower untuk mengubah gambar jadi huruf kecil.
    // in array untuk mengecek string dalam sebuah array
    $ekstensi_gambar_benar = ['jpg','jpeg','png'];
    $ekstensi_gambar = explode('.', $namafile);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if(!in_array($ekstensi_gambar, $ekstensi_gambar_benar)){
        echo " 
        <script>
            alert('File Yang Di Upload Wajib PNG/JPG/JPEG !');
        </script>
        ";
        return false;
    }
    //check ukuran gambar
    if($ukuranfile > 10000000){
        echo " 
        <script>
            alert('File Yang Di Upload Terlalu Besar !');
        </script>
        ";
        return false;
    }
    // cegah agar nama file gambar tak duplikat
    $namafile_baru = uniqid();
    $namafile_baru .= '.';
    $namafile_baru .= $ekstensi_gambar;
    // Setelah Validasi, gambar bisa diupload

    move_uploaded_file($tmpname,'img/' . $namafile_baru);
    return $namafile_baru;

}

function registrasi($data){
    GLOBAL $db;

    $nama = strtolower(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["username"]));
    $no_induk = strtolower(stripslashes($data["no_induk"]));
    $password = mysqli_real_escape_string($db,$data["password"]);
    $confirm = mysqli_real_escape_string($db,$data["confirm"]);
    // $photo = htmlspecialchars($data["photo"]);
        $foto_profil = uploadregis();
    if (!$foto_profil ){
        return false;
    }



    // cek user name & no induk udah ada atau belum
    $result_user = mysqli_query($db, "SELECT username FROM admin1 WHERE username = '$username'");
    $result_induk = mysqli_query($db, "SELECT username FROM admin1 WHERE no_induk = '$no_induk'");

    if(mysqli_fetch_assoc($result_user)){
        echo "
            <script>
                alert('Username Sudah Terdaftar');
            </script>
        ";
        return false;
    }
    if(mysqli_fetch_assoc($result_induk)){
        echo "
            <script>
                alert('No induk Sudah Terdaftar');
            </script>
        ";
        return false;
    }


    // cek konfirmasi password
    if( $password !== $confirm ){
        echo "
            <script>
                alert('Konfirmasi Password tak sesuai');
            </script>
        ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    $confirm = password_hash($confirm, PASSWORD_DEFAULT);

    //tambahkan user ke database
    mysqli_query($db, "INSERT INTO admin1 
                    VALUES('','$nama','$username','$no_induk','$password','$confirm','$foto_profil')
                ");
    return mysqli_affected_rows($db);
}

function getinfoadmin($id){
    global $db;
    $query = mysqli_query($db, "SELECT * FROM admin1 WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);
    return $data;
}
function cari($keyword){
    $query = "SELECT * FROM info_Driver
                WHERE
                Nama_Driver LIKE '%$keyword%'
                ";
    return query($query);
}
?>