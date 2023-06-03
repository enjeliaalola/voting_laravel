<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header('Content-Type: application/json');
	session_start();
	require_once("./conf.php");
	
	$id_calon = strip_tags(addslashes($_POST['id_calon']));
	$id_pemilih = strip_tags(addslashes($_POST['id_pemilih']));
	
	$getDataPemilih = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM hasil WHERE id_pemilih = '{$id_pemilih}' "));
	if(empty($getDataPemilih['id'])){
		mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO hasil(id_calon,id_pemilih,jumlah,waktu) VALUES('{$id_calon}','{$id_pemilih}',1,now())");
		$dataJsonGenerate = array("success" => true, "msg" => "Anda telah berhasil melakukan Voting");
	}else{
		$dataJsonGenerate = array("success" => true, "msg" => "Anda Sudah Melakukan Voting pada Tanggal ".str_replace(" "," Jam ",$getDataPemilih['waktu']));
	}
	echo json_encode($dataJsonGenerate, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>