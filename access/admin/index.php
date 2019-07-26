<?php
	$page = isset($_GET['p'])?$_GET['p'] : '';
	if($page == crypt('dashboard','DitoCahyaPratama')){
		include_once('page/index.php');
	}else if($page == crypt('bukuIndukGuru','DitoCahyaPratama')){
		include_once('page/buku_induk_guru.php');
	}else if($page == crypt('BISiswa','DitoCahyaPratama')){
		include_once('page/buku_induk_siswa.php');
	}else if($page == crypt('dataAnakDidik','DitoCahyaPratama')){
		include_once('page/data_anak_didik.php');
	}else if($page == crypt('dataCeklisKelas','DitoCahyaPratama')){
		include_once('page/data_ceklis_per_kelas.php');
	}else if($page == crypt('dataCekAnak','DitoCahyaPratama')){
		include_once('page/data_ceklis_per_anak.php');
	}else if($page == crypt('dataCatatanAnekdot','DitoCahyaPratama')){
		include_once('page/data_catatan_anekdot.php');
	}else if($page == crypt('dataHasilKarya','DitoCahyaPratama')){
		include_once('page/data_hasil_karya.php');
	}else if($page == crypt('kompilasiData','DitoCahyaPratama')){
		include_once('page/kompilasi_data.php');
	}else if($page == crypt('dataLaporan','DitoCahyaPratama')){
		include_once('page/data_laporan.php');
	}else if($page == crypt('prota','DitoCahyaPratama')){
		include_once('page/prota.php');
	}else if($page == crypt('promes','DitoCahyaPratama')){
		include_once('page/promes.php');
	}else if($page == crypt('propeng','DitoCahyaPratama')){
		include_once('page/propeng.php');
	}else if($page == crypt('detGuru','DitoCahyaPratama')){
		include_once('page/detail/detail_guru.php');
	}else if($page == crypt('detSiswa','DitoCahyaPratama')){
		include_once('page/detail/detail_siswa.php');
	}else if($page == crypt('kompetensi','DitoCahyaPratama')){
		include_once('page/kompetensi.php');
	}else if($page == crypt('aspek','DitoCahyaPratama')){
		include_once('page/aspek.php');
	}else if($page == crypt('tema','DitoCahyaPratama')){
		include_once('page/tema.php');
	}else if($page == crypt('404','DitoCahyaPratama')){
		include_once('page/404.php');
	}else{
		include_once('page/index.php');
	}
?>