<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json');
	session_start();
	require_once("./conf.php");
	
	$id = strip_tags(addslashes($_POST['id']));
	$nama = strtoupper(strip_tags(addslashes($_POST['nama'])));
	$nisn = strip_tags(addslashes($_POST['nisn']));
	$kelas = strip_tags(addslashes($_POST['kelas']));
	$username = strip_tags(addslashes($_POST['username']));
	$password_backup = strip_tags(addslashes($_POST['password']));
	$password = md5($password_backup);
	$fotocalon = $_FILES['gambar'];
	$ubahGbr = "";
	
	if(empty($nama) || empty($kelas) || empty($nisn) || empty($username) || empty($password)){
		echo json_encode(array("success" => false, "msg" => "Nama, NISN, Kelas, Username dan Password wajib diisi"));
		exit();
	}
	if(!empty($fotocalon['name'])){
		$namafile = strip_tags(addslashes($fotocalon['name']));
		$typefile = explode(".",$namafile);
		$tipe = end($typefile);
		$namaF = "{$nisn}_pemilih";
		$linkUpload = "./images/{$namaF}.{$tipe}";
		$gambar = "{$namaF}.{$tipe}";
		$cekType = array("png","jpg","jpeg");
		if(in_array($tipe,$cekType)){
			if(move_uploaded_file($fotocalon['tmp_name'],$linkUpload)){
				$getDataGambar = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT gambar FROM pemilih WHERE id = '{$id}' "));
				$nmFg = explode("/",$getDataGambar['gambar']);
				$nmFg = end($nmFg);
				unlink("./images/{$nmFg}");
				$ubahGbr = ",gambar='https://evotingosis.musky.site/images/{$gambar}'";
			}
		}else{
			echo json_encode(array("success" => false, "msg" => "File yang Diizinkan Hanya File PNG, atau JPG"));
			exit();
		}
	}
	if(empty($id)){
		mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO pemilih(nama,nisn,kelas,username,password,password_backup,gambar) VALUES('{$nama}','{$nisn}','{$kelas}','{$username}','{$password}','{$password_backup}','https://evotingosis.musky.site/images/{$gambar}')");
	}else{
		mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pemilih SET nama = '{$nama}',nisn = '{$nisn}',kelas = '{$kelas}',username = '{$username}',password = '{$password}',password_backup = '{$password_backup}'{$ubahGbr} WHERE id = '{$id}' ");
	}
	$dataJsonGenerate = array("success" => true, "msg" => "Data berhasil disimpan");
	echo json_encode($dataJsonGenerate, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>