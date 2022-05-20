<?php
require "../functions.php";


$pendaftaran = tabel("SELECT * FROM pendaftaran INNER JOIN pasien ON pendaftaran.id_pasien=pasien.id_pasien INNER JOIN poli ON pendaftaran.id_poli=poli.id_poli ");



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
                            <h1 class="page-title">Antrian Berobat</h1>


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
            <div class="section-body  py-4">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12">

                            <div class="table-responsive mb-4">
                                <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>tanggal</th>
                                            <th>No Antrian</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Jenis Poli</th>
                                            <th>Umur</th>
                                            <th>Status</th>
                                            <th>aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pendaftaran as $data) : ?>
                                            <tr class="gradeA">
                                                <td><?= $i ?></td>
                                                <td><?= $data["tanggal"] ?></td>
                                                <td><?= $data["no_antri"] ?></td>
                                                <td><?= $data["nik"] ?></td>
                                                <td><?= $data["nama"] ?></td>
                                                <td><?= $data["nama_poli"] ?></td>
                                                <td>
                                                    <?php $lahir    = new DateTime($data['tanggal_lahir']);
                                                    $today        = new DateTime();
                                                    $umur = $today->diff($lahir);
                                                    echo $umur->y;
                                                    echo " Tahun ";

                                                    ?>
                                                </td>

                                                <td><?= $data["status_pasien"] ?></td>
                                                <td class="actions">
                                                    <a href="periksa_pasien.php?id=<?= $data["id_pasien"] ?>">
                                                        <button class=" btn btn-sm btn-icon on-default button-remove" data-toggle="tooltip" data-original-title="Periksa Pasien">
                                                            <i class="material-icons">fact_check</i>
                                                        </button>
                                                    </a>
                                                    <a href="cetak_kartu_pasien.php?id=<?= $data["id_pasien"] ?>" target="_blank">
                                                        <button class=" btn btn-sm btn-icon on-default button-remove" data-toggle="tooltip" data-original-title="Data Pasien">
                                                            <i class="material-icons">info</i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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