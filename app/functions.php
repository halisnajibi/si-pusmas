<?php
//koneksi
$conn = mysqli_connect("localhost", "root", "", "si_pusmas");


//ambilsemua data di dalam tabel di database
function tabel($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//petugas

//tambah pasien
function tambahPasien($pos)
{
    global $conn;
    $nik = htmlspecialchars($pos["nik"]);
    $nama = htmlspecialchars($pos["nama"]);
    $jk = $pos["jk"];
    $tgl_lhr = $pos["tanggal_lahir"];
    $gd = $pos["gol_darah"];
    $agama = $pos["agama"];
    $pekerjaan = htmlspecialchars($pos["pekerjaan"]);
    $alamat = htmlspecialchars($pos["alamat"]);
    $telepon = htmlspecialchars($pos["telepon"]);
    $nrm = $pos["nrm"];
    $jamkes = $pos["jamkes"];
    $noJamkes = htmlspecialchars($pos["no_jamkes"]);

    //insert tabel pasien
    $sql1 = "INSERT INTO pasien VALUES
            ('','$nik','$nama','$tgl_lhr','$jk','$gd','$agama','$pekerjaan','$alamat','$telepon')";
    mysqli_query($conn, $sql1);
    //inset tabel rekam medis
    $ambilSemua    = mysqli_query($conn, "SELECT * FROM pasien ORDER BY id_pasien DESC LIMIT 1");
    $ambilSatu = mysqli_fetch_assoc($ambilSemua);
    $idPasien = $ambilSatu["id_pasien"];
    $sql2 = "INSERT INTO rekam_medis VALUES
            ('','$idPasien','$nrm','','','','','','','','','','$jamkes','$noJamkes'
            )";
    mysqli_query($conn, $sql2);
    return mysqli_affected_rows($conn);
}

//edit pasien
function editPasien($pos)
{
    global $conn;
    $id = $pos["id_pasien"];
    $nik = htmlspecialchars($pos["nik"]);
    $nama = htmlspecialchars($pos["nama"]);
    $jk = $pos["jk"];
    $tgl_lhr = $pos["tanggal_lahir"];
    $gd = $pos["gol_darah"];
    $agama = $pos["agama"];
    $pekerjaan = htmlspecialchars($pos["pekerjaan"]);
    $alamat = htmlspecialchars($pos["alamat"]);
    $telepon = htmlspecialchars($pos["telepon"]);
    $jamkes = $pos["jamkes"];
    $noJamkes = htmlspecialchars($pos["no_jamkes"]);

    //update table pasien
    $sql1 = "UPDATE pasien SET 
        nik='$nik',
        nama='$nama',
        jk='$jk',
        tanggal_lahir='$tgl_lhr',
        gol_darah='$gd',
        agama='$agama',
        pekerjaan='$pekerjaan',
        alamat='$alamat',
        telepon='$telepon'
        WHERE id_pasien=$id";
    mysqli_query($conn, $sql1);

    //update table rekam medis
    $sql2 = "UPDATE rekam_medis SET
            jamkes='$jamkes',
            no_jamkes='$noJamkes'
            WHERE id_pasien='$id'";
    mysqli_query($conn, $sql2);
    return mysqli_affected_rows($conn);
}

//hapus pasien
function hapusPasien($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien=$id");
    return mysqli_affected_rows($conn);
}

//tambah antrian pasien
function tambahAntrian($pos)
{
    global $conn;
    $idpas = $pos['id_pasien'];
    $poli = $pos["jp"];
    if ($pos["jp"] == 3) {
        $query = mysqli_query($conn, "SELECT max(no_antri) as kodeTerbesar FROM pendaftaran WHERE id_poli=3");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeBarang, 3, 3);
        $urutan++;
        $huruf = "UM";
        $no = sprintf("%03s", $urutan);
        $kodeBarang = $huruf . '-' . $no;
        $noAntri = $kodeBarang;
    } elseif ($pos["jp"] == 4) {
        $query = mysqli_query($conn, "SELECT max(no_antri) as kodeTerbesar FROM pendaftaran WHERE id_poli=4");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeBarang, 3, 3);
        $urutan++;
        $huruf = "AN";
        $no = sprintf("%03s", $urutan);
        $kodeBarang = $huruf . '-' . $no;
        $noAntri = $kodeBarang;
    } else {
        $query = mysqli_query($conn, "SELECT max(no_antri) as kodeTerbesar FROM pendaftaran WHERE id_poli=5");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeBarang, 3, 3);
        $urutan++;
        $huruf = "GG";
        $no = sprintf("%03s", $urutan);
        $kodeBarang = $huruf . '-' . $no;
        $noAntri = $kodeBarang;
    }

    $sql2 = "INSERT INTO pendaftaran VALUES
            ('',current_timestamp(),'menunggu','$poli','$idpas','$noAntri','')";
    mysqli_query($conn, $sql2);
    return mysqli_affected_rows($conn);
}



// akhir petugas


//dokter
function periksaPasien($pos)
{
    global $conn;
    $id_rm = $pos["id_rm"];
    $sub = htmlspecialchars($pos["sub"]);
    $obj = htmlspecialchars($pos["obj"]);
    $ass = htmlspecialchars($pos["ass"]);
    $plant = htmlspecialchars($pos["plant"]);
    $idps = $pos["id_ps"];
    $jamkes = $pos["jamkes"];
    $no_jamkes = $pos["no_jamkes"];
    $sql = "INSERT INTO detail_rm VALUES
        ('','$id_rm',current_timestamp(),'$sub','$obj','$ass','$plant')";
    $sql2 = "UPDATE pendaftaran SET status_pasien='selesai' WHERE  id_pasien=$idps";
    $rpt = htmlspecialchars($pos["rpt"]);
    $rpo = htmlspecialchars($pos["rpo"]);
    $ram = htmlspecialchars($pos["ram"]);
    $rao = htmlspecialchars($pos["rao"]);
    $ro = htmlspecialchars($pos["ro"]);
    $rayah = htmlspecialchars($pos["ra"]);
    $ribu = htmlspecialchars($pos["ri"]);

    $sql3 =
        "UPDATE rekam_medis SET
        tgl_rekam=current_timestamp(),
        rpt='$rpt',
        rpo='$rpo',
        riw_alergi_makn='$ram',
        riw_alergi_obt='$rao',
        riw_operasi='$ro',
        riw_ayah='$rayah',
        riw_ibu='$ribu'
            WHERE id_rm='$id_rm'";


    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    return mysqli_affected_rows($conn);
}

// resep obat
function resepObat($pos)
{
    global $conn;
    $idpas = $pos["idpas"];
    $id_obat = $pos["nama_obat"];
    $ko = $pos["ko"];
    $jum = $pos["jumlah"];
    $ket = htmlspecialchars($pos["ket"]);
    $id_obat2 = $pos["nama_obat2"];
    $ko2 = $pos["ko2"];
    $jum2 = $pos["jumlah2"];
    $ket2 = htmlspecialchars($pos["ket2"]);
    $iddetail = $pos["iddetail"];
    $no_resep = $pos["no_resep"];
    //insest tabel resep_obat
    $sql1 = "INSERT INTO resep_obat VALUES('','$no_resep','$idpas','$iddetail','1',current_timestamp(),'berobat')";
    mysqli_query($conn, $sql1);
    //insert tabel detail_resep_obat
    $ambildata = mysqli_query($conn, "SELECT * FROM resep_obat ORDER BY id_ro DESC LIMIT 1");
    $ambil = mysqli_fetch_assoc($ambildata);
    $id_ro = $ambil["id_ro"];

    $sql2 = "INSERT INTO detail_resep_obat VALUES('','$id_ro','$id_obat','$jum','$ket')";
    $sql_ro = "INSERT INTO detail_resep_obat VALUES('','$id_ro','$id_obat2','$jum2','$ket2')";
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql_ro);


    //update tabel obat
    $ambildata = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$id_obat'");
    $ambil = mysqli_fetch_assoc($ambildata);
    $stokterdahulu = $ambil["stok"];
    $stokbaru = $stokterdahulu - $jum;
    $sql3 = "UPDATE obat SET stok ='$stokbaru' WHERE id_obat=$id_obat";
    mysqli_query($conn, $sql3);

    return mysqli_affected_rows($conn);
}

//akhir dokter
