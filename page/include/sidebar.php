<section>
    <?php
    $id = $_SESSION['id'];
    $query = _run("SELECT * FROM users WHERE id='".$id."'");
    $data = _get($query);
    ?>
        <aside id="leftsidebar" class="sidebar">
            <div class="user-info">
                <div class="image">
                    <img src="assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data['username'] ?></div>
                    <?php
                        if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == '1'){
                            ?>
                            <div class="email"><?php echo $data['email']; ?></div>
                            <?php
                        }else if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == '2'){
                            $query1 = _run("SELECT * FROM teachers");
                            ?>
                            <div class="email"><?php echo $data['email']; ?></div>
                            <?php
                        }
                    ?>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a onclick="var a = confirm('Apakah anda yakin akan logout ?'); if(a == true){ }else{return false;}" href="server.php?p=logout"><i class="material-icons">input</i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                    <li class="header">NAVIGASI UTAMA</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span>Buku Induk</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?p=<?php echo crypt('bukuIndukGuru','DitoCahyaPratama') ?>">Buku Induk Guru</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('BISiswa','DitoCahyaPratama') ?>">Buku Induk Siswa</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">face</i>
                            <span>Anak Didik</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?p=<?php echo crypt('dataAnakDidik','DitoCahyaPratama') ?>">Data Anak Didik</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataCeklisKelas','DitoCahyaPratama') ?>">Data Ceklis Per Kelas</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataCekAnak','DitoCahyaPratama') ?>">Data Ceklis Per Anak</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataCatatanAnekdot','DitoCahyaPratama') ?>">Data Catatan Anekdot</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataHasilKarya','DitoCahyaPratama') ?>">Data Hasil Karya</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('kompilasiData','DitoCahyaPratama') ?>">Kompilasi Data</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataLaporan','DitoCahyaPratama') ?>">Data Laporan Pengembangan Anak</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                    if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == '1'){
                        ?>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">school</i>
                                <span>Guru / Pengajar</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="?p=<?php echo crypt('dataGuru','DitoCahyaPratama') ?>">Data Guru</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                     <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_chart</i>
                            <span>Data Inti</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?p=<?php echo crypt('aspek','DitoCahyaPratama') ?>">Aspek</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('kompetensi','DitoCahyaPratama') ?>">Kompetensi</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('tema','DitoCahyaPratama') ?>">Tema</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_chart_outlined</i>
                            <span>Data Program</span>
                        </a>
                        <ul class="ml-menu">                        
                            <li>
                                <a href="?p=<?php echo crypt('prota','DitoCahyaPratama') ?>">Program Tahunan</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('promes','DitoCahyaPratama') ?>">Program Semester</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('propeng','DitoCahyaPratama') ?>">Program Pengembangan</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('rppm','DitoCahyaPratama') ?>">RPPM</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('rpph','DitoCahyaPratama') ?>">RPPH</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">edit</i>
                            <span>Penilaian</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?p=<?php echo crypt('dataCeklisKelas','DitoCahyaPratama') ?>">Penilaian Ceklis</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataCeklisAnak','DitoCahyaPratama') ?>">Penilaian Catatan Anekdot</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataCatatanAnekdot','DitoCahyaPratama') ?>">Penilaian Hasil Karya</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('dataCatatanAnekdot','DitoCahyaPratama') ?>">Pembuatan Laporan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">list</i>
                            <span>Rekapitulasi</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?p=<?php echo crypt('rekapSiswaPerKelas','DitoCahyaPratama') ?>">Siswa Per Kelas</a>
                            </li>
                            <li>
                                <a href="?p=<?php echo crypt('rekapSiswaPerAgama','DitoCahyaPratama') ?>">Siswa Per Agama</a>
                            </li>
                        </ul>
                    </li>
                    <li class="header">PENGATURAN</li>
                    <li>
                        <a href="?p=<?php echo crypt('settingSekolah','DitoCahyaPratama') ?>">
                            <i class="material-icons col-blue">donut_large</i>
                            <span>Sekolah</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">Khayal.CO - SiPaud</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.1
                </div>
            </div>
        </aside>
    </section>