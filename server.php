<?php
	$conn = mysqli_connect("localhost","root","","kurtilas");
	function _run($query){
		global $conn;
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function _get($query){
		$result = mysqli_fetch_array($query);
		return $result;
	}
	function _num($query){
		$result = mysqli_num_rows($query);
		return $result;
	}
	function _row($query){
		$result = mysqli_fetch_row($query);
		return $result;
	}
	$page = isset($_GET['p'])? $_GET['p'] : '';
	if($page == "login"){
		$uname = trim($_POST['uname']);
		$upass = trim(md5($_POST['upass']));
		$query = _run("SELECT * FROM users WHERE username='".$uname."' AND password='".$upass."'");
		$data = _get($query);
		$username = $data['username'];
		$password = $data['password'];
		$role_id = $data['role_id'];
		if(_num($query) > 0){
			if($uname == $username){
				if($upass == $password){
					if($role_id == '1' || $role_id == '2'){
						session_start();
						$_SESSION['role_id'] = $role_id;
						$_SESSION['username'] = $username;
						$_SESSION['id'] = $data['id'];
						echo "sukses";
					}else{	
						echo "Maaf akun anda tidak dapat digunakan untuk login ! Silahkan login menggunakan akun yang lain !";
					}
				}else{
					echo "Maaf password yang anda inputkan salah ! Masukkan password dengan benar !";
				}	
			}else{
				echo "Maaf username yang anda inputkan salah ! Masukkan username dengan benar !";
			}
		}else{
			echo "Maaf akun belum terdaftar !";
		}
	}else if($page == "logout"){
		session_start();
		session_destroy();
		?>
			<script type="text/javascript">
				alert('Anda berhasil logout !!');
				document.location = "index.php";
			</script>
		<?php
	}else if($page == "getKabupaten"){
		$query = _run("SELECT * FROM regencies WHERE province_id='".$_POST['provinsi']."'");
		while($data = _get($query)){
			?>
			<option value="<?php echo $data['id'] ?>" <?php if($_POST['regency_id'] == $data['id']){?> selected <?php } ?>><?php echo $data['name'] ?></option>
			<?php
		}
	}else if($page == "getKecamatan"){
		$query = _run("SELECT * FROM districts WHERE regency_id='".$_POST['kabupaten']."'");
		while($data = _get($query)){
			?>
			<option value="<?php echo $data['id'] ?>" <?php if($_POST['district_id'] == $data['id']){?> selected <?php } ?>><?php echo $data['name'] ?></option>
			<?php
		}
	}else if($page == "getDesa"){
		$query = _run("SELECT * FROM villages WHERE district_id='".$_POST['kecamatan']."'");
		while($data = _get($query)){
			?>
			<option value="<?php echo $data['id'] ?>" <?php if($_POST['village_id'] == $data['id']){?> selected <?php } ?>><?php echo $data['name'] ?></option>
			<?php
		}
	}

	// Kompetensi 
	else if($page == 'addKompetensiInti'){
		$query = _run("INSERT INTO kompetensi_inti (description) VALUES ('".$_POST['description']."')") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DihODUUCiTbFI");
	}else if($page == 'addKompetensiDasar'){
		$query = _run("INSERT INTO kompetensi_dasar (description, kompetensi_inti_id, aspek_id) VALUES ('".$_POST['description']."','".$_POST['kompetensi_inti_id']."', '".$_POST['aspek_id']."')") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DihODUUCiTbFI");
	}else if($page == 'addMuatan'){
		$query = _run("INSERT INTO muatan (description, kompetensi_dasar_id) VALUES ('".$_POST['description']."','".$_POST['kompetensi_dasar_id']."')") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DihODUUCiTbFI");
	}else if($page == 'updateKompetensi'){
		$query = _run("update kompetensi_inti SET description='".$_POST['desc_ki']."' WHERE id='".$_POST['id_ki']."'") or die("Error :".mysqli_error($conn));
		$query2 = _run("UPDATE kompetensi_dasar SET aspek_id='".$_POST['aspek_id']."', kompetensi_inti_id='".$_POST['kompetensi_inti_id']."', description='".$_POST['desc_kd']."' WHERE id='".$_POST['id_kd']."'");
		$query3 = _run("UPDATE muatan SET kompetensi_dasar_id='".$_POST['kompetensi_dasar_id']."', description='".$_POST['desc_muatan']."' WHERE id='".$_POST['id_muatan']."'");
		header("location: index.php?p=DihODUUCiTbFI");
	}




	//Aspek
	else if($page == 'addAspek'){
		$query = _run("INSERT INTO aspek (description) VALUES ('".$_POST['description']."')");
		header("location: index.php?p=DimPzGcfPn9YE");
	}else if($page == 'updateAspek'){
		$query = _run("UPDATE aspek SET description='".$_POST['description']."' WHERE id='".$_POST['id']."'") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DimPzGcfPn9YE");
	}



	//Tema
	else if($page == 'addTema'){
		$query = _run("INSERT INTO tema (name) VALUES ('".$_POST['name']."')") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=Di3TVMsRLmhpE");
	}
	else if($page == 'addSubTema'){
		$query = _run("INSERT INTO sub_tema (name, tema_id) VALUES ('".$_POST['name']."', '".$_POST['tema_id']."')") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=Di3TVMsRLmhpE");
	}
	else if($page == 'updateTemaSub'){
		$query = _run("UPDATE tema SET name='".$_POST['name_tema']."' WHERE id='".$_POST['id']."'") or die("Error :".mysqli_error($conn));
		$query2 = _run("UPDATE sub_tema SET name='".$_POST['name_subTema']."', tema_id='".$_POST['tema_id']."' WHERE id='".$_POST['id_subTema']."'") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=Di3TVMsRLmhpE");
	}


	else{

	}
?>