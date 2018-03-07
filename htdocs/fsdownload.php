<?php
	error_reporting(0);
	ini_set('display_errors', 0);
	session_start(); 

	if (isset($_SESSION["user"])) {
		$usr = $_SESSION["user"];
		$pass = $_SESSION["pass"];
	}

	if (file_get_contents("../accounts/$usr.acc") == $pass) {
		$file = $_GET['file'];
		if (!(strpos($file, file_get_contents("../accounts/$usr.home")) !== false)) {} else {
			header('content-type:application/binary');
			Header("Content-Disposition: attachment; filename=$file");
			$fp = fopen($file, 'r');
			while (false !== ($char = fgetc($fp))) {
			    echo "$char";
			}			
			exit();
		}
	}
?>
