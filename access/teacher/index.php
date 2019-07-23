<?php
	$page = isset($_GET['p'])?$_GET['p'] : '';
	if($page == crypt('dashboard','DitoCahyaPratama')){
		include_once('page/index.php');
	}else if($page == crypt('dataAnakDidik','DitoCahyaPratama')){
		include_once('page/data_anak_didik.php');
	}else if($page == crypt('dataPenilaianHarian','DitoCahyaPratama')){
		include_once('page/data_penilaian_harian.php');
	}else if($page == crypt('dataPenilaianBulanan','DitoCahyaPratama')){
		include_once('page/data_penilaian_bulanan.php');
	}else{
		include_once('page/index.php');
	}
?>