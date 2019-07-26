<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Buku Induk Siswa</title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    <!-- DATA TABLE CSS -->
    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
</head>
<body class="theme-blue">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Mohon bersabar...</p>
        </div>
    </div>
    <div class="overlay"></div>
    <?php
    include_once('include/navbar.php');
    include_once('include/sidebar.php');
    ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    BUKU INDUK SISWA
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No.Induk</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>No.Induk</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Detail</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $query = _run("SELECT * FROM proteges");
                                                while ($data = _get($query)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $data['no_induk']; ?></td>
                                                        <td><?php echo $data['nama_lengkap']; ?></td>
                                                        <td><?php echo $data['jk']; ?></td>
                                                        <td><?php echo $data['tempat_lahir'].", ".$data['tanggal_lahir']; ?></td>
                                                        <td><?php echo $data['alamat']; ?></td>
                                                        <td><a href="?p=<?php echo crypt('detSiswa','DitoCahyaPratama') ?>&det=<?php echo crypt($data['id'],'DitoCahyaPratama') ?>"><button class="btn btn-primary">Detail</button></a></td>
                                                    </tr>
                                                    <?php   
                                                    $no++;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/plugins/node-waves/waves.js"></script>
    <script src="assets/plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/index.js"></script>
    <!-- DATA TABLE JQUERY -->
    <script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>
</html>
