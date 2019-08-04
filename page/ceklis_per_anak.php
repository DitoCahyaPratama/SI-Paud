<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Penilaian Ceklis Per Anak</title>
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
                                Ceklis Per Anak
                            </h2>
                        </div>
                        <div class="body">
                            <?php
                            if (isset($_GET['det'])) {
                                $query_aspek = _run("SELECT * FROM teachers");
                                while ($data_aspek = _get($query_aspek)) {
                                    if (crypt($data_aspek['id'], 'DitoCahyaPratama') == $_GET['det']) {
                                        $id = $data_aspek['id'];
                                    }
                                }
                                if (isset($_GET['det']) && $_GET['det'] == crypt($id, 'DitoCahyaPratama')) {
                                    $queryambil = _run("SELECT * FROM teachers WHERE id = '" . $id . "'");
                                    $dataambil = _get($queryambil);
                                    ?>
                                    <form action="server.php?p=updateTeacher" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $dataambil['id']; ?>">
                                        <label for="name">Nama</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" value="<?php echo $dataambil['name']; ?>" class="form-control" placeholder="Ketikkan Nama Anak Didik di sini ... " />
                                            </div>
                                        </div>
                                        <label for="tempattgl">Tempat / Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="tempat" value="<?php echo $dataambil['place_born']; ?>" name="tempat" class="form-control" placeholder="Tempat Lahir " />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="date" id="tgl" name="tgl" value="<?php echo $dataambil['date_born']; ?>" class="form-control" placeholder="Ketikkan Aspek di sini ... " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="classs">Kelas</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="classs" name="kelas" value="<?php echo $dataambil['kelas']; ?>" class="form-control" placeholder="Ketikkan Kelas Anak Didik di sini ... " />
                                            </div>
                                        </div>
                                        <label for="tglmasuk">Tanggal Masuk</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" id="tglmasuk" name="tglmasuk" value="<?php echo $dataambil['date_in']; ?>" class="form-control" placeholder="Ketikkan Nama Anak Didik di sini ... " />
                                            </div>
                                        </div>
                                        <label for="tglkeluar">Tanggal Keluar</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="date" id="tglkeluar" name="tglkeluar" value="<?php echo $dataambil['date_out']; ?>" class="form-control" placeholder="Ketikkan Nama Anak Didik di sini ... " />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Perbarui</button>
                                    </form>
                                <?php
                                } else {
                                    ?>
                                    <form action="server.php?p=addTeacher" method="POST">
                                        <label for="nip">NIP</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nip" name="nip" class="form-control" placeholder="Ketikkan NIP Guru di sini ... " />
                                            </div>
                                        </div>
                                        <label for="name">Nama</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name" name="name" class="form-control" placeholder="Ketikkan Nama Guru di sini ... " />
                                            </div>
                                        </div>
                                        <label for="position">Posisi</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select id="position" name="position" class="form-control">
                                                    <option value="1">Kepala Sekolah</option>
                                                    <option value="2">Guru</option>
                                                    <option value="3">Operator</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>

                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambahkan</button>
                                </form>
                            <?php
                            }
                        } else {
                            ?>
                            <form action="server.php?p=addTeacher" method="POST">
                                <label for="nip">Anak Didik</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="nip" name="namaanak" class="form-control">
                                            <option selected disabled>Pilih murid</option>
                                            <?php
                                                $query = _run("SELECT * FROM student LEFT JOIN ceklis_anak ON student.id = ceklis_anak.id_murid WHERE ceklis_anak.id_murid IS NULL ");
                                                while($data = _get($query)){?>
                                                    <option value="<?Php echo $data['name']; ?>"> <?Php echo $data['name']; ?> </option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <label for="name">Tanggal</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="name" name="tanggal" class="form-control" />
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
                        <h2>Data Anak Yang Sudah Di Ceklis</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Posisi</th>
                                        <th>Kelompok Belajar</th>
                                        <th>Jumlah Anak Didik</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Posisi</th>
                                        <th>Kelompok Belajar</th>
                                        <th>Jumlah Anak Didik</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = _run("SELECT * FROM teachers");
                                    while ($data = _get($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nip'] ?></td>
                                            <td><?php echo $data['nama_lengkap'] ?></td>
                                            <td><?php
                                                switch ($data['position_id']) {
                                                    case 1:
                                                        echo "Kepala Sekolah";
                                                        break;
                                                    case 2:
                                                        echo "Guru";
                                                        break;
                                                    case 3:
                                                        echo "Operator";
                                                        break;
                                                }
                                                ?></td>
                                            <td>
                                                <?php
                                                $query1 = _run("SELECT*FROM groups WHERE id ='" . $data['group_id'] . "'");
                                                $data1 = _get($query1);
                                                echo $data1['name'];
                                                ?>
                                            </td>
                                            <td><?php echo $data['jumlah_anak_didik'] ?></td>
                                            <td>
                                                <a href="?p=<?php echo crypt('dataAnakDidik', 'DitoCahyaPratama') ?>&det=<?php echo crypt($data['id'], 'DitoCahyaPratama') ?>">
                                                    <button type="button" class="btn btn-warning waves-effect">
                                                        <i class="material-icons">edit</i>
                                                        <span>Edit</span>
                                                    </button>
                                                </a>
                                                <a href="server.php?p=deleteAnakDidik&id=<?php echo $data['id'] ?>">
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