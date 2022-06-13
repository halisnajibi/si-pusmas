<?php
require "../functions.php";
$biodata = tabel("SELECT * FROM resep_obat INNER JOIN  pasien ON resep_obat.id_pasien=pasien.id_pasien INNER JOIN dokter ON resep_obat.id_dokter=dokter.id_dokter ORDER BY id_ro DESC LIMIT 1")[0];
$idro = $biodata['id_ro'];
$nama_obat = tabel("SELECT * FROM detail_resep_obat INNER JOIN obat ON detail_resep_obat.id_obat=obat.id_obat INNER JOIN kategori_obat ON obat.id_ko=kategori_obat.id_ko WHERE id_ro='$idro'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../../assets/css/style.css">
 <title>cetak resep obat</title>


</head>

<body>
 <div class="cetak_ro">
  <h1>pemerintahan kabupaten hulu sungai selatan</h1>
  <h1>dinas kesehatan</h1>
  <h1>updt puskesmas wasah hulu</h1>
  <img src="../../assets/image/logo-hss.png" alt="logo-hss" class="logo-hss">
  <img src="../../assets/image/logo-puskesmas-terbaru-sesuai-permenkes-tahun-1.png" alt="logo-puskemas" class="logo-puskes">
  <p>665J+5C4, Jl. Bukhari, Wasah Hulu, Kec. Simpur, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71261</p>
  <div class="biodata">
   <table cellspacing="5px">
    <tr>
     <td>No Resep</td>
     <td>: <?= $biodata["no_resep"] ?></td>
    </tr>
    <tr>
     <td>Nama Pasien</td>
     <td>: <?= $biodata["nama_pasien"] ?> </td>
    </tr>
    <tr>
     <td>Dokter Pemeriksa</td>
     <td>: <?= $biodata["nama_dokter"] ?> </td>
    </tr>

    <tr>
     <td>Tanggal & Waktu Kunjungan</td>
     <td>: <?= $biodata["waktu"] ?> </td>
    </tr>
   </table>
  </div>
  <div class="nama-obat">
   <table width="100%" border="1" cellspacing="0">
    <tr>
     <th>No</th>
     <th>Nama Obat</th>
     <th>Kategori</th>
     <th>jumlah</th>
     <th>Keterangan</th>
    </tr>
    <?php
    $i = 1;
    $total = 0;
    ?>
    <?php foreach ($nama_obat as $data) :
     $total += $data["jumlah"];
    ?>
     <tr>
      <td><?= $i ?></td>
      <td><?= $data["nama_obat"] ?></td>
      <td><?= $data["nama_ko"] ?></td>
      <td><?= $data["jumlah"] ?></td>
      <td><?= $data["keterangan"] ?></td>
     </tr>
     <?php $i++; ?>
    <?php endforeach; ?>
    <tr>
     <td colspan="3" style="text-align: center;">TOTAL</td>
     <td><?= $total ?></td>
    </tr>
   </table>
  </div>
 </div>
 <p class="apotek">bawa resep obat ke bagian apoteker !!</p>
 <div class="tanda-tangan">
  <p><?= $biodata["nama_dokter"] ?></p>
  <p>nip 124445</p>
 </div>

 <script>
  window.print();
 </script>
</body>

</html>