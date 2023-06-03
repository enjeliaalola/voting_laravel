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
	$getDataQuery = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM calon {$where} ORDER BY nama ASC");
	while($getDataView = mysqli_fetch_array($getDataQuery)){
		$getDataHasil = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT SUM(jumlah) AS total FROM hasil WHERE id_calon = '{$getDataView['id']}' "));
		if(empty($getDataHasil['total'])){
			$getDataHasil['total'] = 0;
		}
		$dataJsonGenerate[] = array(
			"id" => $getDataView['id'],
			"nama" => $getDataView['nama'],
			"kelas" => $getDataView['kelas'],
			"moto" => $getDataView['moto'],
			"warna" => generateRandomColor(),
			"hasil" => $getDataHasil['total'],
			"gambar" => $getDataView['gambar']
		);
	}
	
	function generateRandomColor() {
	  $red = rand(0, 255);
	  $green = rand(0, 255);
	  $blue = rand(0, 255);
	  $color = sprintf("#%02x%02x%02x", $red, $green, $blue);

	  return $color;
	}
	echo json_encode($dataJsonGenerate, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>