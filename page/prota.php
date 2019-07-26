<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Program Tahunan</title>
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
    <?php
    include_once('include/navbar.php');
    include_once('include/sidebar.php');
    ?> 
    <section class="content" id="promes">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#Semester1" aria-controls="Semester1" role="tab" data-toggle="tab">Semester 1</a></li>
                                    <li role="presentation"><a href="#Semester2" aria-controls="Semester2" role="tab" data-toggle="tab">Semester 2</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="Semester1">
                                        <div class="card">
                                            <div class="header bg-light-blue">
                                                <h2>
                                                     Program Tahunan Semester 1
                                                </h2>
                                            </div>
                                            <div class="body ">
                                                <div class="profile-card">
                                                    <div class="profile-footer">
                                                        <ul>
                                                            <li>
                                                                <span>Satuan Pendidikan</span>
                                                                <span>Paud Matahari</span>
                                                            </li>
                                                            <li>
                                                                <span>Tahun Pelajaran</span>
                                                                <span>2019</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <form action="server.php?p=generatePromes" method="POST">
                                                        <label for="kompetensi_dasar_id">Kompetensi Dasar</label>
                                                        <select class="form-control show-tick" name="kompetensi_dasar_id">
                                                            <option value="">-- Please select --</option>
                                                            <?php
                                                                $query_KD = _run("SELECT * FROM kompetensi_dasar");
                                                                while ($data_KD = _get($query_KD)) {
                                                                    ?>
                                                                    <option value="<?php echo $data_KD['id'] ?>"><?php echo $data_KD['id'].".".$data_KD['description'] ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <br><br>
                                                        <label for="tema_id">Tema</label>
                                                        <select class="form-control show-tick" name="tema_id">
                                                            <option value="">-- Please select --</option>
                                                            <?php
                                                                $query_tema = _run("SELECT * FROM tema");
                                                                while ($data_tema = _get($query_tema)) {
                                                                    ?>
                                                                    <option value="<?php echo $data_tema['id'] ?>"><?php echo $data_tema['id'].".".$data_tema['name'] ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <br><br>
                                                        <label for="sub_tema_id">Sub Tema</label>
                                                        <select class="form-control show-tick" name="sub_tema_id">
                                                            <option value="">-- Please select --</option>
                                                            <?php
                                                                $query_subTema = _run("SELECT * FROM sub_tema");
                                                                while ($data_subTema = _get($query_subTema)) {
                                                                    ?>
                                                                    <option value="<?php echo $data_subTema['id'] ?>"><?php echo $data_subTema['id'].".".$data_subTema['name'] ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <br><br>
                                                        <label for="alokasi_waktu">alokasi_waktu</label>
                                                        <select class="form-control show-tick" name="alokasi_waktu">
                                                            <option value="">-- Please select --</option>
                                                            <?php
                                                                for($i=1; $i<=4; $i++){
                                                                    ?>
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?> Minggu</option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                        <br><br>
                                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambah</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kompetensi Dasar</th>
                                                        <th>Tema</th>
                                                        <th>Sub Tema</th>
                                                        <th>Alokasi Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kompetensi Dasar</th>
                                                        <th>Tema</th>
                                                        <th>Sub Tema</th>
                                                        <th>Alokasi Waktu</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                        <?php
                                        $no = 1;
                                        $query = _run("SELECT * FROM prota");
                                        while ($data = _get($query)) {
                                            $queri = _run("SELECT description FROM kompetensi_dasar WHERE id='".$data['kompetensi_dasar_id']."'");
                                            $id_dasar = _get($queri);
                                            $queri2 = _run("SELECT name FROM tema WHERE id='".$data['tema_id']."'");
                                            $id_tema = _get($queri2);
                                            $queri3 = _run("SELECT name FROM sub_tema WHERE id='".$data['sub_tema_id']."'");
                                            $id_sub_tema = _get($queri3);
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $id_dasar['description'] ?></td>
                                                <td><?php echo $id_tema['name']?></td>
                                                <td><?php echo $id_sub_tema['name'] ?></td>
                                                <td><?php echo $data['alokasi_waktu'] ?></td>
                                                
                                                <td>
                                                    <a href="?p=<?php echo crypt('dataAnakDidik', 'DitoCahyaPratama') ?>&det=<?php echo crypt($data['id'], 'DitoCahyaPratama') ?>">
                                                        <button type="button" class="btn btn-warning waves-effect">
                                                            <i class="material-icons">edit</i>
                                                            <span>Edit</span>
                                                        </button>
                                                    </a>
                                                    <a href="server.php?p=deleteAnakDidik&id=<?php echo $data['id']?>">
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
                                    <div role="tabpanel" class="tab-pane fade in" id="Semester2">

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
    <script type="text/javascript">
        var tampil_promes = document.getElementById('promes');
        var edit_promes = document.getElementById('editPromes');
        show();
        function show(){
          if(tampil_promes.style.display == 'block'){
            tampil_promes.style.display = 'none';
            edit_promes.style.display = 'block';
          }else{
            tampil_promes.style.display = 'block';
            edit_promes.style.display = 'none';
          }
        }
    </script>
</body>
</html>
