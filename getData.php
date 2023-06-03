<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json');
	session_start();
	require_once("./conf.php");
	
	$id = strip_tags(addslashes($_POST['id']));
	if(!empty($id)){
		$where = "WHERE id = '{$id}'";
	}else{
		$where = "";
	}
	$getDataTotalCalon = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM calon "));
	$getDataTotalPemilih = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM pemilih "));
	$getDataTotalSudah = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM hasil "));
	$getDataQuery = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM calon {$where} ORDER BY nama ASC");
	while($getDataView = mysqli_fetch_array($getDataQuery)){
		$dataJsonGenerate[] = array(
			"id" => $getDataView['id'],
			"nama" => $getDataView['nama'],
			"kelas" => $getDataView['kelas'],
			"moto" => $getDataView['moto'],
			"gambar" => $getDataView['gambar'],
			"sudah_memilih" => $getDataTotalSudah['total'],
			"total_calon" => $getDataTotalCalon['total'],
			"total_pemilih" => $getDataTotalPemilih['total']
		);
	}
	echo json_encode($dataJsonGenerate, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>