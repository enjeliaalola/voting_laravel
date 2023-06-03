<?php
	error_reporting(0);
	set_time_limit(0);
	$hostsvr = "localhost";
	$usersvr = "root";
	$passsvr = "";
	$datasvr = "evoting_osis";
	$link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($hostsvr,  $usersvr,  $passsvr)) or die('Tidak dapat melakukan koneksi database ' . $host . ' ' . mysql_get_last_message());
	$db = ((bool)mysqli_query( $link, "USE " . $datasvr));
	date_default_timezone_set('Asia/Jakarta');
?>