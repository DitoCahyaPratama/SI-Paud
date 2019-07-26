<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Data Tema</title>
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
    <section class="content">
        <div class="container-fluid">
            <?php
            if(isset($_GET['det'])){
                $query_tema = _run("SELECT * FROM tema");
                while($data_tema = _get($query_tema)){
                    if (crypt($data_tema['id'],'DitoCahyaPratama') == $_GET['det']) {
                        $id = $data_tema['id'];
                    }
                }
                if(isset($_GET['det']) && $_GET['det'] == crypt($id, 'DitoCahyaPratama')){
                    $queryambil = _run("SELECT tema.id AS temaid, tema.name AS name_tema FROM tema WHERE id = '".$id."'");
                    $dataambil = _get($queryambil);
                    ?>
                    <div class="row clearfix">
                        <form action="server.php?p=updateTema" method="POST">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Tema
                                    </h2>
                                </div>
                                <div class="body">
                                        <input type="hidden" name="id" value="<?php echo $dataambil['temaid']; ?>" >
                                        <label for="name_tema">Nama Tema</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name_tema" class="form-control" placeholder="Ketikkan Tema di sini ... " value="<?php echo $dataambil['name_tema'] ?>">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Perbarui</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Sub Tema
                                    </h2>
                                </div>
                                <div class="body">
                                        <input type="hidden" name="id_subTema" value="<?php echo $dataambil['id_subTema']; ?>">
                                        <label for="tema_id">id Tema</label>
                                        <select class="form-control show-tick" name="tema_id">
                                            <option value="">-- Pilih Tema --</option>
                                            <?php
                                                $query_tema = _run("SELECT * FROM tema");
                                                while ($data_tema = _get($query_tema)) {
                                                    ?>
                                                    <option value="<?php echo $data_tema['id'] ?>" <?php if($dataambil['id'] == $data_tema['id']){?> selected <?php } ?>><?php echo $data_tema['id'].".".$data_tema['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        <label for="name_subTema">Nama Sub Tema</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name_subTema" class="form-control" placeholder="Ketikkan Sub Tema di sini ... " value="<?php echo $dataambil['name_subTema'] ?>">
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div> -->
                        </form>
                    </div>    
                    <?php               
                }else{
                    ?>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Tema
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="server.php?p=addTema" method="POST">
                                        <label for="name">Nama Tema</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Ketikkan Tema di sini ... ">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Sub Tema
                                    </h2>
                                </div>
                                <div class="body">
                                    <form action="server.php?p=addSubTema" method="POST">
                                        <label for="id">id Tema</label>
                                        <select class="form-control show-tick" name="tema_id">
                                            <option value="">-- Pilih Tema --</option>
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
                                        <label for="name">Nama Sub Tema</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Ketikkan Sub Tema di sini ... ">
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
            }else if(isset($_GET['de'])){
                $query_tema = _run("SELECT * FROM sub_tema");
                while($data_tema = _get($query_tema)){
                    if (crypt($data_tema['id'],'DitoCahyaPratama') == $_GET['de']) {
                        $id = $data_tema['id'];
                    }
                }
                if(isset($_GET['de']) && $_GET['de'] == crypt($id, 'DitoCahyaPratama')){
                    $queryambil = _run("SELECT *  FROM sub_tema WHERE id = '".$id."'");
                    $dataambil = _get($queryambil);
                    ?>
                    <div class="row clearfix">
                        <form action="server.php?p=updateSubTema" method="POST">
                        
                        <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header bg-light-blue">
                                    <h2>
                                        Sub Tema
                                    </h2>
                                </div>
                                <div class="body">
                                        <input type="hidden" name="id_subTema" value="<?php echo $dataambil['id']; ?>">
                                        <!-- <label for="tema_id">id Tema</label>
                                        <select class="form-control show-tick" name="tema_id">
                                            <option value="">-- Pilih Tema --</option>
                                            <?php
                                                $query_tema = _run("SELECT * FROM tema");
                                                while ($data_tema = _get($query_tema)) {
                                                    ?>
                                                    <option value="<?php echo $data_tema['id'] ?>" <?php if($dataambil['id'] == $data_tema['id']){?> selected <?php } ?>><?php echo $data_tema['id'].".".$data_tema['name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br> -->
                                        <label for="name_subTema">Nama Sub Tema</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name_subTema" class="form-control" placeholder="Ketikkan Sub Tema di sini ... " value="<?php echo $dataambil['name'] ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Perbarui</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>    
                    <?php               
                }
            }else{
                ?>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-light-blue">
                                <h2>
                                    Tema
                                </h2>
                            </div>
                            <div class="body">
                                <form action="server.php?p=addTema" method="POST">
                                    <label for="name">Nama Tema</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Ketikkan Tema di sini ... ">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-light-blue">
                                <h2>
                                    Sub Tema
                                </h2>
                            </div>
                            <div class="body">
                                <form action="server.php?p=addSubTema" method="POST">
                                    <label for="id">id Tema</label>
                                    <select class="form-control show-tick" name="tema_id">
                                        <option value="">-- Pilih Tema --</option>
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
                                    <label for="name">Nama Sub Tema</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Ketikkan Sub Tema di sini ... ">
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
            <div class="row clearfix" id="tema">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class="btn btn-primary waves-effect" onclick="show()">Edit Data Tema</button>
                            <button class="btn btn-primary waves-effect" onclick="showEditSub()">Edit Data Sub Tema</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tema</th>
                                            <th>Sub Tema</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tema</th>
                                            <th>Sub Tema</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = _run("SELECT tema.id, tema.name AS name_tema, sub_tema.name AS name_subTema FROM tema INNER JOIN sub_tema ON sub_tema.tema_id = tema.id");
                                        while ($data = _get($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['name_tema'] ?></td>
                                                <td><?php echo $data['name_subTema'] ?></td>
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
            <div class="row clearfix" id="editTema">
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
                                            <th>Tema</th>                                    
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tema</th>                                           
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = _run("SELECT tema.id AS temaid, tema.name AS name_tema, sub_tema.name AS name_subTema FROM tema INNER JOIN sub_tema ON sub_tema.tema_id = tema.id");
                                        while ($data = _get($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['name_tema'] ?></td>
                                                
                                                <td>
                                                    <a href="?p=<?php echo crypt('tema','DitoCahyaPratama') ?>&det=<?php echo crypt($data['temaid'],'DitoCahyaPratama') ?>">
                                                            <button type="button" class="btn btn-warning waves-effect">
                                                                <i class="material-icons">edit</i>
                                                                <span>Edit</span>
                                                            </button>
                                                        </a>
                                                        <a href="server.php?p=deleteTema&id=<?php echo $data['temaid']?>">
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

            <div class="row clearfix" id="editSubTema">
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
                                            <th>SubTema</th>                                    
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tema</th>
                                            <th>SubTema</th>                                           
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = _run("SELECT tema.id AS temaid, tema.name AS name_tema, sub_tema.name AS name_subTema, sub_tema.id AS subid FROM tema INNER JOIN sub_tema ON sub_tema.tema_id = tema.id");
                                        while ($data = _get($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['name_tema'] ?></td>
                                                <td><?php echo $data['name_subTema'] ?></td>
                                                
                                                <td>
                                                    <a href="?p=<?php echo crypt('tema','DitoCahyaPratama') ?>&de=<?php echo crypt($data['subid'],'DitoCahyaPratama') ?>">
                                                            <button type="button" class="btn btn-warning waves-effect">
                                                                <i class="material-icons">edit</i>
                                                                <span>Edit</span>
                                                            </button>
                                                        </a>
                                                        <a href="server.php?p=deleteSubTema&id=<?php echo $data['subid']?>">
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
    <script type="text/javascript">
        var tampil_tema = document.getElementById('tema');
        var edit_tema = document.getElementById('editTema');
        var edit_sub_tema = document.getElementById('editSubTema');
        show();
        function show(){
          if(tampil_tema.style.display == 'block'){
            tampil_tema.style.display = 'none';
            edit_tema.style.display = 'block';
            edit_sub_tema.style.display = 'none';
          }else{
            tampil_tema.style.display = 'block';
            edit_tema.style.display = 'none';
            edit_sub_tema.style.display = 'none';
          }
        }
        function showEditSub(){
            tampil_tema.style.display = 'none';
            edit_tema.style.display = 'none';
            edit_sub_tema.style.display = 'block';
        }
    </script>
</body>
</html>
