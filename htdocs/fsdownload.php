<?php
	error_reporting(0);
	ini_set('display_errors', 0);
	$usr = $_GET['usr'];
	$pass = $_GET['hpass'];
    if (!(file_get_contents("../accounts/$usr.acc") == $pass)) {
		$file = $_GET['file'];
		header('content-type:application/binary');
		Header("Content-Disposition: attachment; filename=$file");
		exit(file_get_contents($file));
	}
?>