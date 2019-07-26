<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Program Semester</title>
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
            <?php
            if(isset($_GET['det'])){
                $query_kompetensi = _run("SELECT * FROM muatan");
                while($data_kompetensi = _get($query_kompetensi)){
                    if (crypt($data_kompetensi['id'],'DitoCahyaPratama') == $_GET['det']) {
                        $id = $data_kompetensi['id'];
                    }
                }
                if(isset($_GET['det']) && $_GET['det'] == crypt($id, 'DitoCahyaPratama')){
                    $queryambil = _run("SELECT muatan.id AS id_muatan, muatan.description AS desc_muatan, muatan.kompetensi_dasar_id AS id_kd, kompetensi_dasar.description AS desc_kd, kompetensi_dasar.aspek_id AS id_aspek, kompetensi_dasar.kompetensi_inti_id AS id_ki, kompetensi_inti.description AS desc_ki FROM muatan RIGHT JOIN kompetensi_dasar ON kompetensi_dasar.id = muatan.kompetensi_dasar_id RIGHT JOIN kompetensi_inti ON kompetensi_inti.id=kompetensi_dasar.id WHERE muatan.id = '".$id."'");
                    $dataambil = _get($queryambil);
                    ?>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <button class="btn btn-primary waves-effect" onclick="show()">Edit Data Promes</button>
                                </div>
                                <div class="body">
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

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <?php               
                }else{
                    ?>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Pilih Tahun dan Semester
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="server.php?p=generatePromes" method="POST">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control show-tick" name="tahun">
                                            <option value="">-- Please select --</option>
                                            <?php
                                                $now = date('Y');
                                                for($i=$now; $i>=2000; $i--){
                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <label>Pilih Semester</label>
                                        <div class="form-group">
                                            <input name="semester" type="radio" id="semester1" class="radio-col-blue" value="1" />
                                            <label for="semester1">Semester 1</label>
                                            <input name="semester" type="radio" id="semester2" class="radio-col-blue" value="2" />
                                            <label for="semester2">Semester 2</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cari</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>         
                    <?php
                }
            }else{
                ?>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-light-blue">
                                <h2>
                                    Pilih Tahun dan Semester
                                </h2>
                            </div>
                            <div class="body">
                                <form action="server.php?p=addKompetensiInti" method="POST">
                                    <label for="tahun">Tahun</label>
                                    <select class="form-control show-tick" name="tahun">
                                        <option value="">-- Please select --</option>
                                        <?php
                                            $now = date('Y');
                                            for($i=$now; $i>=2000; $i--){
                                                ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <br><br>
                                    <label>Pilih Semester</label>
                                    <div class="form-group">
                                        <input name="semester" type="radio" id="semester1" class="radio-col-blue" value="1" />
                                        <label for="semester1">Semester 1</label>
                                        <input name="semester" type="radio" id="semester2" class="radio-col-blue" value="2" />
                                        <label for="semester2">Semester 2</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
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
