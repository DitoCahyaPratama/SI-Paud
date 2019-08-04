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
		$check = $_POST['rememberme'];
		$time = time();
		if(_num($query) > 0){
			if($uname == $username){
				if($upass == $password){
					if($role_id == '1' || $role_id == '2'){
						session_start();
						$_SESSION['role_id'] = $role_id;
						$_SESSION['username'] = $username;
						$_SESSION['id'] = $data['id'];
						if($check) {
							setcookie ("login",$username,time()+ (10 * 365 * 24 * 60 * 60));
							setcookie ("password",$_POST['upass'],time()+ (10 * 365 * 24 * 60 * 60));
						}
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
		session_unset();
		session_destroy();		
		setcookie("login","",time()- (10 * 365 * 24 * 60 * 60));
		setcookie("password","",time()- (10 * 365 * 24 * 60 * 60));
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
	}else if($page == 'updateKompetensiInti'){
		$query = _run("UPDATE kompetensi_inti SET description='".$_POST['desc_ki']."' WHERE id='".$_POST['id_ki']."'")or die("Error : ".mysqli_error($conn));
		header("location: index.php?p=DihODUUCiTbFI");
	}else if($page == 'deleteKompetensi'){		
		$query = _run("SELECT*FROM kompetensi_dasar WHERE kompetensi_inti_id='".$_GET['id']."'")or die("Error : ".mysqli_error($conn));
		$data =  _get($query);
		$query1 = _run("DELETE FROM muatan WHERE kompetensi_dasar_id='".$data['id']."'")or die("Error : ".mysqli_error($conn));
		$query = _run("DELETE FROM prota WHERE kompetensi_dasar_id ='".$data['id']."'")or die("Error : ".mysqli_error($conn));
		$query2 = _run("DELETE FROM kompetensi_dasar WHERE kompetensi_inti_id='".$_GET['id']."'")or die("Error : ".mysqli_error($conn));	
		$query3 = _run("DELETE FROM kompetensi_inti WHERE id='".$_GET['id']."'")or die("Error : ".mysqli_error($conn));
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
	else if($page == 'updateSubTema'){
		$query2 = _run("UPDATE sub_tema SET name='".$_POST['name_subTema']."' WHERE id='".$_POST['id_subTema']."'") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=Di3TVMsRLmhpE");
	}else if ($page == 'updateTema') {
		$query = _run("UPDATE tema SET name='".$_POST['name_tema']."' WHERE id='".$_POST['id']."'") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=Di3TVMsRLmhpE");
	}else if($page == 'deleteTema'){
		$query = _run("DELETE FROM sub_tema WHERE tema_id = '".$_GET['id']."'");
		$query2 = _run("DELETE FROM tema WHERE id = '".$_GET['id']."'");
		header("location: index.php?p=Di3TVMsRLmhpE");
	}else if($page == 'deleteSubTema'){
		$query = _run("DELETE FROM sub_tema WHERE id = '".$_GET['id']."'");
		header("location: index.php?p=Di3TVMsRLmhpE");
	}

	//AnakDidik
	else if($page == 'addAnakDidik'){
		$query = _run("INSERT INTO student (name,place_born,date_born,kelas,date_in,date_out) VALUES ('".$_POST['name']."','".$_POST['tempat']."','".$_POST['tgl']."','".$_POST['kelas']."','".$_POST['tglmasuk']."','".$_POST['tglkeluar']."')") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DiqINcDCKLIwU");
	}
	else if($page == 'addAnakDidik'){
		$query = _run("INSERT INTO sub_tema (name, tema_id) VALUES ('".$_POST['name']."', '".$_POST['tema_id']."')") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DiqINcDCKLIwU");
	}
	else if($page == 'updateAnakDidik'){
		$query = _run("UPDATE student SET name='".$_POST['name']."', place_born='".$_POST['tempat']."',date_born='".$_POST['tgl']."',kelas='".$_POST['kelas']."',date_in='".$_POST['tglmasuk']."',date_out='".$_POST['tglkeluar']."' WHERE id='".$_POST['id']."'") or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DiqINcDCKLIwU");
	}else if($page == 'deleteAnakDidik'){
		$query = _run("DELETE FROM student WHERE id = '".$_GET['id']."'");
		header("location: index.php?p=DiqINcDCKLIwU");
	}

	//ProgramTahunan
	else if ($page == 'generatePromes'){
		$query = _run("INSERT INTO prota (kompetensi_dasar_id,tema_id,sub_tema_id,alokasi_waktu) VALUES ('".$_POST['kompetensi_dasar_id']."', '".$_POST['tema_id']."', '".$_POST['sub_tema_id']."', '".$_POST['alokasi_waktu']."')")or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DiQIhx0XCMy4g");
	}

	//Kelompok Belajar
	else if ($page == 'addKb'){
		$query = _run("INSERT INTO groups (name) VALUES ('".$_POST['name']."')")or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DiCq2qZSGc2cU");
	}else if ($page == 'updateKb'){
		$query = _run("UPDATE groups SET name='".$_POST['name']."' WHERE id='".$_POST['id']."'")or die("Error :".mysqli_error($conn));
		header("location: index.php?p=DiCq2qZSGc2cU");
	}else if ($page == 'deleteKb'){
		$query = _run("DELETE FROM groups WHERE id = '".$_GET['id']."'");
		header("location: index.php?p=DiCq2qZSGc2cU");
	}

	//Teacher
	else if($page == 'addTeacher'){
		session_start();
		$query = _run("INSERT INTO teachers (nip,nama_lengkap,position_id,group_id,jumlah_anak_didik,user_id) VALUES ('".$_POST['nip']."','".$_POST['name']."','".$_POST['position']."','".$_POST['group']."','".$_POST['jumlahMurid']."','".$_SESSION['id']."')")or die("Error :".mysqli_error($conn));		
		header("location: index.php?p=DiLjVqut9hSK6");
	}

	else{

	}
?>