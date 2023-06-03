<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json');
	session_start();
	require_once("./conf.php");
	
	$id = strip_tags(addslashes($_POST['id']));
	$nama = strip_tags(addslashes($_POST['nama']));
	$kelas = strip_tags(addslashes($_POST['kelas']));
	$moto = strip_tags(addslashes($_POST['moto']));
	$fotocalon = $_FILES['gambar'];
	$ubahGbr = "";
	
	if(empty($id) && empty($fotocalon['name'])){
		echo json_encode(array("success" => false, "msg" => "Foto Calon Tidak Boleh Kosong"));
		exit();
	}
	if(empty($nama) || empty($kelas) || empty($moto)){
		echo json_encode(array("success" => false, "msg" => "Nama, Kelas, dan Moto wajib diisi"));
		exit();
	}
	if(!empty($fotocalon['name'])){
		$namafile = strip_tags(addslashes($fotocalon['name']));
		$typefile = explode(".",$namafile);
		$tipe = end($typefile);
		$namaF = md5($nama.$kelas.$fotocalon['name'].date("ymdhis"));
		$linkUpload = "./images/{$namaF}.{$tipe}";
		$gambar = "{$namaF}.{$tipe}";
		$cekType = array("png","jpg","jpeg");
		if(in_array($tipe,$cekType)){
			if(move_uploaded_file($fotocalon['tmp_name'],$linkUpload)){
				$getDataGambar = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT gambar FROM calon WHERE id = '{$id}' "));
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
		mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO calon(nama,kelas,moto,gambar) VALUES('{$nama}','{$kelas}','{$moto}','https://evotingosis.musky.site/images/{$gambar}')");
	}else{
		mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE calon SET nama = '{$nama}',kelas = '{$kelas}',moto = '{$moto}'{$ubahGbr} WHERE id = '{$id}' ");
	}
	$dataJsonGenerate = array("success" => true, "msg" => "Data berhasil disimpan");
	echo json_encode($dataJsonGenerate, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>