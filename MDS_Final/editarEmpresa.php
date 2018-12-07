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
    require_once 'classes/empresa.php';
    $m = new empresa;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Estágio</title>
    <link href="estilo/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estiloEditarEmpresa.css">
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
      <h1>Editar Empresa</h1>
      <?php $rows_empresa = mysqli_fetch_assoc($resultado_empresa) ?>
      <form method="POST"> 
        <input type="text" name="nome" placeholder="Nome da Empresa" maxlength="30" value =  <?php echo $rows_empresa['nome']; ?> >
        <input type="hidden" name="CNPJ" placeholder="CNPJ" maxlength="14" value =  <?php echo $rows_empresa['CNPJ']; ?>>
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30" value =  <?php echo $rows_empresa['telefone']; ?>>
        <input type="hidden" name="email" placeholder="email" maxlength="40" value =  <?php echo $rows_empresa['email']; ?>>
        <input type="password" name="senha" placeholder="Senha" maxlength="15" >
        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="EDITAR">
       
      </form>
    </div>

<?php

//verificar se clicou no botão
if(isset($_POST['nome'])){

  $nome = addslashes($_POST['nome']);
  $CNPJ = addslashes($_POST['CNPJ']);
  $telefone = addslashes($_POST['telefone']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['confSenha']);

  //verificar se esta preenchido
 
    $m->conectar("web_estagio", "localhost","root","");
    
     if($senha == $confirmarSenha){
        if($m->editar($nome,$CNPJ,$telefone, $email, $senha)){
          ?>
          <div id="msg-sucesso">
          Cadastro alterado com sucesso!
          </div>
          <?php
        }
      }
      else{
          ?>
          <div class="msg-erro">
          As senhas não são correspondentes!
          </div>
          <?php
      }
    

}


?>
   </body>
</html>