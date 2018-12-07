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
  $id_vagas = $_GET['id'];

  $result_vagas = "SELECT * FROM vagas WHERE id_vagas = $id_vagas";

  $resultado_vagas = mysqli_query($conn, $result_vagas);
 
?>
<?php
    require_once 'classes/vagas.php';
    $v = new vagas;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Estágio</title>
    <link href="estilo/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/editarVagas.css">
  </head>
  <body>
  <div id="menu">     
            <ul>
                <li><a>Perfil</a>
                    <ul>
                        <li><a href="editarEmpresa.php">Editar</a></li>
                        <li><a href="deletarEmpresa.php">Excluir</a></li>
                        <li><a href="sairEmpresa.php">SAIR</a></li>
                    </ul>
                </li>
                
                <li><a>Vagas</a>
                    <ul>
                        <li><a href="criarVaga.php">Criar uma Vaga</a></li>
                        <li><a href="verificarVagas.php">Verficar Vagas</a></li>
                    </ul>
                </li>
                
                <li><a href="quemSomos.php">Quem Somos</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
<div id="corpo-form-Cad">
      <h1>Editar Vaga</h1>
      <?php $rows_vagas = mysqli_fetch_assoc($resultado_vagas) 

      ?>
      

      <form method="POST">
       

        <input type="hidden" name="id_vagas" placeholder="id_vagas" <?php echo $rows_vagas['id_vagas']; ?>>
        <input type="text" name="descricao" placeholder="Descrição" maxlength="200" <?php echo $rows_vagas['descricao']; ?>>
    
        <input type="submit" value="EDITAR">
       
      </form>
    </div>

<?php

//verificar se clicou no botão
if(isset($_POST['id_vagas'])){

  $descricao = addslashes($_POST['descricao']);
  

  //verificar se esta preenchido
 
    $v->conectar("web_estagio", "localhost","root","");
    
     
        if($v->editar($id_vagas, $descricao)){
          ?>
          <div id="msg-sucesso">
          Cadastro alterado com sucesso!
          </div>
          <?php
        }
      
     
    

}


?>
   </body>
</html>