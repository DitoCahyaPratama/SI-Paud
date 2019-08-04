<?php
	include_once("server.php");
	session_start();
	// error_reporting(E_ALL);
	if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == '1'){
		include_once("access/admin/index.php");
	}else if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == '2'){
		include_once("access/teacher/index.php");
	}else{
		include_once("access/public/index.php");
	}
?>