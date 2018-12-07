<?php
	session_start();
	session_destroy();
	unset($_SESSION['id_candidato']);
	//$_SESSION['message'] = "Você saiu";
	header("location: index.php");
?>
