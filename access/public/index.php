<?php
	$page = isset($_GET['p'])?$_GET['p'] : '';
	if($page == crypt('login','DitoCahyaPratama')){
		include_once('page/login.php');
	}else{
		include_once('page/login.php');
	}
?>