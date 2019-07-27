<?php
    $query_teachers = _run("SELECT * FROM proteges");
    while($data_teachers = _get($query_teachers)){
        if (crypt($data_teachers['id'],'DitoCahyaPratama') == $_GET['det']) {
            $id = $data_teachers['id'];
        }
    }
    if(isset($_GET['det']) && $_GET['det'] == crypt($id, 'DitoCahyaPratama')){
        $queryambil = _run("SELECT * FROM proteges WHERE id = '".$id."'");
        $dataambil = _get($queryambil);
    }else{
      header('location:?p='.crypt('404', 'DitoCahyaPratama'));
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Buku Induk Guru</title>
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
    include_once('page/include/navbar.php');
    include_once('page/include/sidebar.php');
    ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-3">
                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="assets/images/user_teach.png" alt="AdminBSB - Profile Image" />
                                </div>
                                <div class="content-area">
                                    <h3><?php echo $dataambil['nama_lengkap'] ?></h3>
                                    <p><?php echo $dataambil['alamat'] ?></p>
                                    <p>Siswa</p>
                                </div>
                            </div>
                            <div class="profile-footer">
                                <ul>
                                    <li>
                                        <span>NIP</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>TTL</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Jenis Kelamin</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Agama</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>Alamat</span>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span>No. HP</span>
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="card">
                            <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#keluarga" aria-controls="keluarga" role="tab" data-toggle="tab">Keluarga</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="keluarga">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-body profile-card">
                                                <div class="profile-footer">
                                                  <ul>
                                                      <li>
                                                          <span>Gol. Darah</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Nama Ayah</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Nama Ibu</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Nama Suami / Istri</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Jumlah Anak</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>No. HP</span>
                                                          <span></span>
                                                      </li>
                                                  </ul>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
