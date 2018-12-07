<?php
  session_start();
  if(!isset($_SESSION['id_candidato'])){
    header("location: index.php");
    exit;
  }



?>
<?php
    require_once 'classes/candidato.php';
    $c = new candidato;
?>
<?php
	session_start();
    //echo $_SESSION['id_empresa'];
	if(!isset($_SESSION['id_candidato'])){
		header("location: index.php");
		exit;
	}
?>
<?php
  include_once("conexaoBD.php");
  $result_candidato = "SELECT * FROM candidato WHERE id_candidato = '". $_SESSION['id_candidato']."'";
  $resultado_candidato = mysqli_query($conn, $result_candidato);


  
?>

  

<?php 


$c->conectar("web_estagio", "localhost","root","");
 
  $id_candidato = intval( $_SESSION['id_candidato']);
    if($c->excluir($id_candidato)){
      
      header("location: index.php");

     }



 ?>
