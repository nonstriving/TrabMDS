<?php
  session_start();
  if(!isset($_SESSION['id_empresa'])){
    header("location: index.php");
    exit;
  }



?>
<?php
    require_once 'classes/empresa.php';
    $e = new empresa;
?>
<?php
	session_start();
    //echo $_SESSION['id_empresa'];
	if(!isset($_SESSION['id_empresa'])){
		header("location: index.php");
		exit;
	}
?>
<?php
  include_once("conexaoBD.php");
  
  $result_empresa = "SELECT * FROM empresa WHERE id_empresa = '". $_SESSION['id_empresa']."'";
  $resultado_empresa = mysqli_query($conn, $result_empresa);


  
?>

 <?php 

 $rows_empresa = mysqli_fetch_assoc($resultado_empresa) 
 
?>
<?php 

//global $id_empresa = 5;


?>

<tr>
  

    $id_empresa = " echo $rows_empresa['id_empresa'] ";

    <td> $nome ="  echo $rows_empresa['nome'] "; </td>
    $CNPJ =" <?php echo $rows_empresa['CNPJ'] ?>";
    $telefone =" <?php echo $rows_empresa['telefone'] ?>";
    $email =" <?php echo $rows_empresa['email'] ?>";
    $senha =" <?php echo $rows_empresa['senha'] ?>";

    
  
</tr>  


<?php 



 // $id_empresa = addslashes($_POST['id_empresa']);

$e->conectar("web_estagio", "localhost","root","");
  //printf("%d",$id_empresa);
 // $id_empresa = " <?php echo $rows_empresa['id_empresa'] ?";
  $id_empresa = intval( $_SESSION['id_empresa']);
    if($e->excluir($id_empresa)){
      //encaminhar para area privada
      header("location: index.php");

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
