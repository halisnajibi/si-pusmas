<?php
require "../functions.php";
//merubah status pasien
// $id = $_GET["id"];
// $cekdata = tabel("SELECT * FROM pendaftaran WHERE id_pasien='$id'")[0];
// $sql = "UPDATE pendaftaran SET status_pasien='proses' WHERE id_pasien=$id";
// $query = mysqli_query($conn, $sql);
//akhir
$rm = tabel("SELECT * FROM rekam_medis WHERE id_pasien='$id'")[0];

//tambah detail_rm
if (isset($_POST["simpan"])) {
    if (periksaPasien($_POST) > 0) {
        echo
        " <script>
          alert('data berhasil di simpan');
        </script> ";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Crush On The most popular Admin Dashboard template and ui kit">
    <meta name="author" content="PuffinTheme the theme designer">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <title>Si Pusmas</title>
    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="../../assets/plugins/bootstrap/css/bootstrap.min.css" />

    <!-- Plugins css -->
    <link rel="stylesheet" href="../../assets/plugins/charts-c3/c3.min.css" />
    <link rel="stylesheet" href="../../assets/plugins/jvectormap/jvectormap-2.0.3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Core css -->
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="stylesheet" href="../../assets/assets/css/theme1.css" id="theme_stylesheet" />
    <link rel="stylesheet" href="../../assets/plugins/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <style>
        td.details-control {
            background: url('../../assets/images/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.shown td.details-control {
            background: url('../assets/images/details_close.png') no-repeat center center;
        }
    </style>

    <!-- Core css -->
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="stylesheet" href="../../assets/assets/css/theme1.css" id="theme_stylesheet" />
</head>

<body class="font-opensans">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>

    <div id="main_content">
        <div id="header_top" class="header_top">
            <div class="container">
                <div class="hleft">
                    <a class="header-brand" href="index.php"><img src="../../assets/image/logo-puskesmas-terbaru-sesuai-permenkes-tahun-1.png" alt=""></a>
                    <div class="dropdown">
                    </div>
                </div>
                <div class="hright">
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="../../assets/image/doctor.png" alt="" data-toggle="tooltip" data-placement="right" title="Profiel" /></a>
                        <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa  fa-align-left"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="user_div">
            <h5 class="brand-name mb-4">Si Pusmas<a href="javascript:void(0)" class="user_btn"><i class="icon-logout"></i></a></h5>
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <img class="avatar avatar-xl mr-3" src="../../assets/image/doctor.png" alt="avatar">
                        <div class="media-body">
                            <h5 class="m-0">Nama Dokter</h5>
                            <p class="text-muted mb-0">Dokter Puskemas</p>
                            <ul class="social-links list-inline mb-0 mt-2">
                                <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="1234567890"><i class="fa fa-phone"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" title="" data-toggle="tooltip" data-original-title="@skypename"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="left-sidebar" class="sidebar ">
            <h5 class="brand-name">Si Pusmas<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul class="metismenu">

                    <li><a href="index.php"><i class="icon-home"></i><span>Dashboard</span></a></li>
                    <li class="active"><a href="data_antri.php"><i class="material-icons">pending_actions</i><span>Data Antrian</span></a></li>

                    <li><a href="antrian_pasien.php"><i class="icon-notebook"></i><span>Data Berobat</span></a></li>
                </ul>
            </nav>
        </div>

        <div class="page">
            <div id="page_top" class="section-white ">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <h1 class="page-title">Pencatatan Rekam Medis</h1>


                        </div>
                        <div class="right">

                            <div class="notification d-flex">


                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown">nama petugas<i class="fa fa-user pl-3"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <span></span> <a class="dropdown-item" href="page-profile.html"><i class="dropdown-icon fe fe-user"></i> Edit Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html"><i class="dropdown-icon fe fe-log-out"></i> Log out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body py-4">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Form Periksaan Pasien</h3>
                                </div>
                                <div class="card-body">
                                    <form id="basic-form" method="post" novalidate>
                                        <input type="hidden" name="id_rm" value="<?= $rm['id_rm'] ?>">
                                        <div class="form-group">
                                            <label>No Rekam Medis</label>
                                            <input type="text" class="form-control" required name="nrm" value="<?= $rm['no_rm'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Riwayat Penyakit Terdahulu</label>
                                            <input type="text" class="form-control" required name="rpt" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Riwayat Pemberian Obat</label>
                                            <input type="text" class="form-control" required name="rpo" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Riwayat Alergi Makanan</label>
                                            <input type="text" class="form-control" required name="ram" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Riwayat Alergi Obat</label>
                                            <input type="text" class="form-control" required name="rao" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Riwayat Operasi</label>
                                            <input type="text" class="form-control" required name="ro" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Riwayat Ayah</label>
                                            <input type="text" class="form-control" required name="ra" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Riwayat Ibu</label>
                                            <input type="text" class="form-control" required name="ri" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Jamkes</label>
                                            <input type="text" class="form-control" required name="ram" autocomplete="off" value="<?= $rm['jamkes'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>No Jamkes</label>
                                            <input type="text" class="form-control" required name="ram" autocomplete="off" value="<?= $rm['no_jamkes'] ?>" readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="section-body">
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                Copyright © 2022 <a href="javascript:void(0)">halis najibi</a>.
                            </div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>


    <script src="../../assets/bundles/lib.vendor.bundle.js"></script>

    <script src="../../assets/bundles/counterup.bundle.js"></script>
    <script src="../../assets/bundles/jvectormap1.bundle.js"></script>
    <script src="../../assets/bundles/c3.bundle.js"></script>

    <script src="../../assets/js/core.js"></script>
    <script src="../../assets/assets/js/page/index.js"></script>


    <script src="../../assets/bundles/dataTables.bundle.js"></script>

    <script src="../../assets/js/core.js"></script>
    <script src="../../assets/assets/js/table/datatable.js"></script>
</body>

</html>