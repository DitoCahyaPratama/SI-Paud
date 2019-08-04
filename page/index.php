<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SiPaud | Dashboard</title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
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
    $query =  _run("SELECT * FROM student");
    $students = _num($query);
    $query1 = _run("SELECT*FROM teachers");
    $teacher = _num($query1);
    ?> 
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">Jumlah Siswa</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $students; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">school</i>
                        </div>
                        <div class="content">
                            <div class="text">Jumlah Guru</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $teacher; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done_outline</i>
                        </div>
                        <div class="content">
                            <div class="text">Siswa Sudah Dinilai</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">clear</i>
                        </div>
                        <div class="content">
                            <div class="text">Siswa Belum Dinilai</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="assets/images/user-lg.jpg" alt="AdminBSB - Profile Image" />
                            </div>
                            <div class="content-area">
                                <h3>PAUD Matahari</h3>
                                <p>Desa Dilem</p>
                                <p>Negeri</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>NSS</span>
                                    <span>40065465442</span>
                                </li>
                                <li>
                                    <span>NIS</span>
                                    <span>41002120</span>
                                </li>
                                <li>
                                    <span>NPSN</span>
                                    <span>30212152185</span>
                                </li>
                                <li>
                                    <span>Akreditasi</span>
                                    <span>A Tahun 2019</span>
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
                                    <li role="presentation" class="active"><a href="#alamat" aria-controls="alamat" role="tab" data-toggle="tab">Alamat</a></li>
                                    <li role="presentation"><a href="#akademik" aria-controls="akademik" role="tab" data-toggle="tab">Akademik</a></li>
                                    <li role="presentation"><a href="#kepala_sekolah" aria-controls="kepala_sekolah" role="tab" data-toggle="tab">Kepala PAUD/TK</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="alamat">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-body profile-card">
                                                <div class="profile-footer">
                                                  <ul>
                                                      <li>
                                                          <span>Provinsi</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Kabupaten</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Kecamatan</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Desa</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Jalan</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Kode Pos</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Telp / Fax</span>
                                                          <span></span>
                                                      </li>
                                                      
                                                  </ul>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="akademik">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-body profile-card">
                                                <div class="profile-footer">
                                                  <ul>
                                                      <li>
                                                          <span>Program Setudi</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Jumlah Guru</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Waktu KBM</span>
                                                          <span></span>
                                                      </li> 
                                                  </ul>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="kepala_sekolah">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-body profile-card">
                                                <div class="profile-footer">
                                                  <ul>
                                                      <li>
                                                          <span>Nama Kepala PAUD/TK</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>NIP</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Pangkat / Gol / TMT</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>Pendidikan Terakhir</span>
                                                          <span></span>
                                                      </li>
                                                      <li>
                                                          <span>SK Kepala PAUD/TK</span>
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
</body>
</html>
