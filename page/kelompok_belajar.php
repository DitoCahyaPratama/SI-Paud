<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Data Kelompok Belajar</title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <?php
    include_once('include/navbar.php');
    include_once('include/sidebar.php');
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-light-blue">
                            <h2>
                                Kelompok Belajar
                            </h2>
                        </div>
                        <div class="body">
                            <?php
                            if (isset($_GET['det'])) {
                                $query_aspek = _run("SELECT * FROM groups");
                                while ($data_aspek = _get($query_aspek)) {
                                    if (crypt($data_aspek['id'], 'DitoCahyaPratama') == $_GET['det']) {
                                        $id = $data_aspek['id'];
                                    }
                                }
                                if (isset($_GET['det']) && $_GET['det'] == crypt($id, 'DitoCahyaPratama')) {
                                    $queryambil = _run("SELECT * FROM groups WHERE id = '" . $id . "'");
                                    $dataambil = _get($queryambil);
                                    ?>
                                    <form action="server.php?p=updateKb" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dataambil['id']; ?>">
                                        <label for="name">Nama Kelompok Belajar</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" value="<?php echo $dataambil['name']; ?>" class="form-control" placeholder="Ketikkan Nama Anak Didik di sini ... " />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Perbarui</button>
                                    </form>
                                <?php
                                } else {
                                    ?>
                                    <form action="server.php?p=addKb" method="POST">                                        
                                        <label for="name">Nama Kelompok Belajar</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Ketikkan Nama Anak Didik di sini ... " />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                    </form>
                                <?php
                                }
                            } else {
                                ?>
                                  <form action="server.php?p=addKb" method="POST">                                       
                                        <label for="name">Nama Kelompok Belajar</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Ketikkan Nama Anak Didik di sini ... " />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                    </form>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Kelompok Belajar</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>                                            
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Opsi</th>                                        
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = _run("SELECT * FROM groups");
                                        while ($data = _get($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data['name'] ?></td>                                                
                                                <td>
                                                    <a href="?p=<?php echo crypt('kelompok_belajar', 'DitoCahyaPratama') ?>&det=<?php echo crypt($data['id'], 'DitoCahyaPratama') ?>">
                                                        <button type="button" class="btn btn-warning waves-effect">
                                                            <i class="material-icons">edit</i>
                                                            <span>Edit</span>
                                                        </button>
                                                    </a>
                                                    <a href="server.php?p=deleteKb&id=<?php echo $data['id'] ?>">
                                                        <button type="button" class="btn btn-danger waves-effect">
                                                            <i class="material-icons">delete</i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </a>
                                                </td>
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