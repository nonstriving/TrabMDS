<?php
	session_start();
	if(!isset($_SESSION['id_candidato'])){
		header("location: index.php");
		exit;
	}



?>


<?php
 include_once("conexaoBD.php");
 	$id_vag = $_GET['id'];
 	$id_cand = $_SESSION['id_candidato'];
	$result_vagas = "INSERT INTO cadastrovaga (id_cand,id_vag) values ($id_cand,$id_vag)";
	$resultado_vagas = mysqli_query($conn, $result_vagas);

	header("location: cadastroEfetuado.php");

?>