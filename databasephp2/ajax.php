<?php
require './functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM info_Driver
            WHERE
            Nama_Driver LIKE '%$keyword%'
        ";
$data_driver = query($query);

?>
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