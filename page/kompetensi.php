<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Data Kompetensi</title>
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
                        <form action="server.php?p=updateKompetensi" method="POST">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Kompetensi Inti
                                    </h2>
                                </div>
                                <div class="body">
                                        <input type="hidden" name="id_ki" value="<?php echo $dataambil['id_ki'] ?>">
                                        <label for="desc_ki">Deskripsi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="description" name="desc_ki" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "><?php echo $dataambil['desc_ki'] ?></textarea>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Kompetensi Dasar
                                    </h2>
                                </div>
                                <div class="body">
                                        <input type="hidden" name="id_kd" value="<?php echo $dataambil['id_kd'] ?>">
                                        <label for="id">id Aspek</label>
                                        <select class="form-control show-tick" name="aspek_id">
                                            <option value="">-- Pilih Aspek --</option>
                                            <?php
                                                $query_Aspek = _run("SELECT * FROM aspek");
                                                while ($data_Aspek = _get($query_Aspek)) {
                                                    ?>
                                                    <option value="<?php echo $data_Aspek['id'] ?>" <?php if($dataambil['id_aspek'] == $data_Aspek['id']){?> selected <?php } ?>><?php echo $data_Aspek['id'].".".$data_Aspek['description'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <label for="id">id Kompetensi Inti</label>
                                        <select class="form-control show-tick" name="kompetensi_inti_id">
                                            <option value="">-- Pilih Kompetensi Inti --</option>
                                            <?php
                                                $query_KI = _run("SELECT * FROM kompetensi_inti");
                                                while ($data_KI = _get($query_KI)) {
                                                    ?>
                                                    <option value="<?php echo $data_KI['id'] ?>" <?php if($dataambil['id_ki'] == $data_KI['id']){?> selected <?php } ?>><?php echo $data_KI['id'].".".$data_KI['description'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <label for="desc_kd">Deskripsi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="desc_kd" name="desc_kd" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "><?php echo $dataambil['desc_kd'] ?></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" style="width: 100%">Perbarui</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Materi / Muatan
                                    </h2>
                                </div>
                                <div class="body">
                                        <label for="id">id Kompetensi Dasar</label>
                                        <select class="form-control show-tick" name="kompetensi_dasar_id">
                                            <option value="">-- Please select --</option>
                                            <?php
                                                $query_KD = _run("SELECT * FROM kompetensi_dasar");
                                                while ($data_KD = _get($query_KD)) {
                                                    ?>
                                                    <option value="<?php echo $data_KD['id'] ?>" <?php if($dataambil['id_kd'] == $data_KD['id']){?> selected <?php } ?>><?php echo $data_KD['id'].".".$data_KD['description'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <label for="desc_muatan">Deskripsi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="desc_muatan" name="desc_muatan" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "><?php echo $dataambil['desc_muatan'] ?></textarea>
                                                <input type="hidden" name="id_muatan" value="<?php echo $id ?>">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>    
                    <?php               
                }else{
                    ?>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Kompetensi Inti
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="server.php?p=addKompetensiInti" method="POST">
                                        <label for="description">Deskripsi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="description" name="description" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Kompetensi Dasar
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="server.php?p=addKompetensiDasar" method="POST">
                                         <label for="id">id Aspek</label>
                                        <select class="form-control show-tick" name="aspek_id">
                                            <option value="">-- Pilih Aspek --</option>
                                            <?php
                                                $query_Aspek = _run("SELECT * FROM aspek");
                                                while ($data_Aspek = _get($query_Aspek)) {
                                                    ?>
                                                    <option value="<?php echo $data_Aspek['id'] ?>"><?php echo $data_Aspek['id'].".".$data_Aspek['description'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <label for="id">id Kompetensi Inti</label>
                                        <select class="form-control show-tick" name="kompetensi_inti_id">
                                            <option value="">-- Pilih Kompetensi Inti --</option>
                                            <?php
                                                $query_KI = _run("SELECT * FROM kompetensi_inti");
                                                while ($data_KI = _get($query_KI)) {
                                                    ?>
                                                    <option value="<?php echo $data_KI['id'] ?>"><?php echo $data_KI['id'].".".$data_KI['description'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <label for="description">Deskripsi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="description" name="description" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Materi / Muatan
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="server.php?p=addMuatan" method="POST">
                                        <label for="id">id Kompetensi Dasar</label>
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
                                        <label for="description">Deskripsi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="description" name="description" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
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
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-light-blue">
                                <h2>
                                    Kompetensi Inti
                                </h2>
                            </div>
                            <div class="body">
                                <form action="server.php?p=addKompetensiInti" method="POST">
                                    <label for="description">Deskripsi</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="description" name="description" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-light-blue">
                                <h2>
                                    Kompetensi Dasar
                                </h2>
                            </div>
                            <div class="body">
                                <form action="server.php?p=addKompetensiDasar" method="POST">
                                     <label for="id">id Aspek</label>
                                    <select class="form-control show-tick" name="aspek_id">
                                        <option value="">-- Pilih Aspek --</option>
                                        <?php
                                            $query_Aspek = _run("SELECT * FROM aspek");
                                            while ($data_Aspek = _get($query_Aspek)) {
                                                ?>
                                                <option value="<?php echo $data_Aspek['id'] ?>"><?php echo $data_Aspek['id'].".".$data_Aspek['description'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <br><br>
                                    <label for="id">id Kompetensi Inti</label>
                                    <select class="form-control show-tick" name="kompetensi_inti_id">
                                        <option value="">-- Pilih Kompetensi Inti --</option>
                                        <?php
                                            $query_KI = _run("SELECT * FROM kompetensi_inti");
                                            while ($data_KI = _get($query_KI)) {
                                                ?>
                                                <option value="<?php echo $data_KI['id'] ?>"><?php echo $data_KI['id'].".".$data_KI['description'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                    <br><br>
                                    <label for="description">Deskripsi</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="description" name="description" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-light-blue">
                                <h2>
                                    Materi / Muatan
                                </h2>
                            </div>
                            <div class="body">
                                <form action="server.php?p=addMuatan" method="POST">
                                    <label for="id">id Kompetensi Dasar</label>
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
                                    <label for="description">Deskripsi</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="description" name="description" class="form-control" placeholder="Ketikkan Kompetensi Inti di sini ... "></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="row clearfix" id="kompetensi">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class="btn btn-primary waves-effect" onclick="show()">Edit Data Kompetensi</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kompetensi Inti</th>
                                            <th>Kompetensi Dasar</th>
                                            <th>Materi Muatan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kompetensi Inti</th>
                                            <th>Kompetensi Dasar</th>
                                            <th>Materi Muatan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = _run("SELECT kompetensi_inti.id AS id_ki, kompetensi_inti.description AS desc_ki , kompetensi_dasar.id AS id_kd, kompetensi_dasar.description AS desc_kd, muatan.id AS id_muatan, muatan.description AS desc_muatan FROM kompetensi_inti LEFT JOIN kompetensi_dasar ON kompetensi_dasar.kompetensi_inti_id = kompetensi_inti.id LEFT JOIN muatan on muatan.kompetensi_dasar_id = kompetensi_dasar.id");
                                        while ($data = _get($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['desc_ki'] ?></td>
                                                <td><?php echo $data['desc_kd'] ?></td>
                                                <td><?php echo $data['desc_muatan'] ?></td>
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
            <div class="row clearfix" id="editKompetensi">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class="btn btn-primary waves-effect" onclick="show()">Kembali</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kompetensi Inti</th>
                                            <th>Kompetensi Dasar</th>
                                            <th>Materi Muatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kompetensi Inti</th>
                                            <th>Kompetensi Dasar</th>
                                            <th>Materi Muatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = _run("SELECT kompetensi_inti.id AS id_ki, kompetensi_inti.description AS desc_ki , kompetensi_dasar.id AS id_kd, kompetensi_dasar.description AS desc_kd, muatan.id AS id_muatan, muatan.description AS desc_muatan FROM kompetensi_inti LEFT JOIN kompetensi_dasar ON kompetensi_dasar.kompetensi_inti_id = kompetensi_inti.id LEFT JOIN muatan on muatan.kompetensi_dasar_id = kompetensi_dasar.id");
                                        while ($data = _get($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['desc_ki'] ?></td>
                                                <td><?php echo $data['desc_kd'] ?></td>
                                                <td><?php echo $data['desc_muatan'] ?></td>
                                                <td><a href="?p=<?php echo crypt('kompetensi','DitoCahyaPratama') ?>&det=<?php echo crypt($data['id_muatan'],'DitoCahyaPratama') ?>">
                                                            <button type="button" class="btn btn-primary waves-effect">
                                                                <i class="material-icons">edit</i>
                                                                <span>Edit</span>
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
    <script type="text/javascript">
        var tampil_kompetensi = document.getElementById('kompetensi');
        var edit_kompetensi = document.getElementById('editKompetensi');
        show();
        function show(){
          if(tampil_kompetensi.style.display == 'block'){
            tampil_kompetensi.style.display = 'none';
            edit_kompetensi.style.display = 'block';
          }else{
            tampil_kompetensi.style.display = 'block';
            edit_kompetensi.style.display = 'none';
          }
        }
    </script>
</body>
</html>
