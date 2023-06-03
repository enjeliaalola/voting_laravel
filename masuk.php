<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json');
	
	session_start();
	require_once("./conf.php");
	
	$username = strip_tags(addslashes($_POST['username']));
	$password = md5($_POST['password']);
	
	$getDataTotalCalon = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM calon "));
	$getDataTotalPemilih = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM pemilih "));
	$getDataTotalSudah = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM hasil "));
	$getDataView = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM admin WHERE username = '{$username}' AND password = '{$password}' "));
	if(empty($getDataView['nama'])){
		$getDataView = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pemilih WHERE username = '{$username}' AND password = '{$password}' "));
		if(empty($getDataView['nama'])){
			$dataJsonGenerate = array("success" => false, "msg" => "Login gagal, Silahkan periksa kembali Username dan Password Anda...");
		}else{
			$dataJsonGenerate = array("success" => true, "sudah_memilih" => $getDataTotalSudah['total'], "total_calon" => $getDataTotalCalon['total'], "total_pemilih" => $getDataTotalPemilih['total'], "user_id" => $getDataView['id'], "user_nama" => $getDataView['nama'], "user_name" => $getDataView['username'], "user_jenis" => "pemilih", "msg" => "Login berhasil...");
		}
	}else{
		$dataJsonGenerate = array("success" => true, "sudah_memilih" => $getDataTotalSudah['total'], "total_calon" => $getDataTotalCalon['total'], "total_pemilih" => $getDataTotalPemilih['total'], "user_id" => $getDataView['id'], "user_nama" => $getDataView['nama'], "user_name" => $getDataView['username'], "user_jenis" => "admin", "msg" => "Login berhasil...");
	}
	echo json_encode($dataJsonGenerate, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>