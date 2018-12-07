<?php
  session_start();
  if(!isset($_SESSION['id_empresa'])){
    header("location: index.php");
    exit;
  }



?>
<?php
    require_once 'classes/vagas.php';
    $e = new vagas;
?>
<?php
	session_start();
 
	if(!isset($_SESSION['id_empresa'])){
		header("location: index.php");
		exit;
	}
?>
<?php
  include_once("conexaoBD.php");
  $id_vaga = $_GET['id'];
  echo $id_vaga;
  $result_vagas = "SELECT * FROM vagas WHERE id_vagas = $id_vaga";
  echo $result_vagas;
  $resultado_vagas = mysqli_query($conn, $result_vagas);


  
?>

 <?php 

 $rows_evagas = mysqli_fetch_assoc($resultado_vagas) 
 
?>
<?php 

//global $id_empresa = 5;


?>



<?php 



 // $id_empresa = addslashes($_POST['id_empresa']);

$e->conectar("web_estagio", "localhost","root","");
  //printf("%d",$id_empresa);
 // $id_empresa = " <?php echo $rows_empresa['id_empresa'] ?";
  $id_vagas = intval( $id_vaga);
    if($e->excluir($id_vagas)){
      //encaminhar para area privada
      header("location: verificarVagas.php");

      ?>
          <div id="msg-sucesso">
          Cadastro alterado com sucesso!
          </div>
          <?php
        }
      
      else{
          ?>
          <div class="msg-erro">
          As senhas não são correspondentes!
          </div>
          <?php
      }



 ?>