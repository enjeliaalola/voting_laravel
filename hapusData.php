<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json');
	session_start();
	require_once("./conf.php");
	
	$id = strip_tags(addslashes($_POST['id']));
	$tMaster = strip_tags(addslashes($_POST['tMaster']));
	
	mysqli_query($GLOBALS["___mysqli_ston"], "DELETE FROM {$tMaster} WHERE id = '{$id}'");
	$getDataTotalCalon = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM calon "));
	$getDataTotalPemilih = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM pemilih "));
	$getDataTotalSudah = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT COUNT(id) AS total FROM hasil "));
	$getDataGambar = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT gambar FROM {$tMaster} WHERE id = '{$id}' "));
	$nmFg = explode("/",$getDataGambar['gambar']);
	$nmFg = end($nmFg);
	unlink("./images/{$nmFg}");
	$dataJsonGenerate = array(
		"success" => true,
		"msg" => "Data berhasil dihapus",
		"sudah_memilih" => $getDataTotalSudah['total'],
		"total_calon" => $getDataTotalCalon['total'],
		"total_pemilih" => $getDataTotalPemilih['total']
	);
	echo json_encode($dataJsonGenerate, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>