<?php
require "../functions.php";
$id = $_GET["id"];
$pasien = tabel("SELECT * FROM pasien WHERE id_pasien='$id'")[0];
$rm = tabel("SELECT * FROM rekam_medis WHERE id_pasien='$id'")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Berobat</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="container">
        <h2>Kartu Berobat - Pasien</h2>
        <img src="../../assets/image/logo-puskesmas-terbaru-sesuai-permenkes-tahun-1.png" alt="logo puskemas">
        <h2><?= $pasien["nama"] ?></h2>
        <h3><?= $rm["no_rm"] ?></h3>
        <h5>NIK :<?= $pasien["nik"] ?></h5>
        <h5><?= $pasien["tanggal_lahir"] ?> | <?= $pasien["jk"] ?></h5>
        <h5>GOLONGAN DARAH :<?= $pasien["gol_darah"] ?></h5>
        <h5>ALAMAT :<?= $pasien["alamat"] ?></h5>
        <h6>Nama Puskemas</h6>
    </div>
</body>
<script>
    onClick = window.print();
</script>

</html>