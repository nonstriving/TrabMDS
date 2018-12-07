<?php
	session_start();
	session_destroy();
	unset($_SESSION['id_empresa']);
	//$_SESSION['message'] = "Você saiu";
	header("location: index.php");
?>

