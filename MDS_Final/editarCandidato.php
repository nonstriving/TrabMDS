<?php
  session_start();
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
    require_once 'classes/candidato.php';
    $m = new candidato;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Estágio</title>
    <link href="estilo/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estiloEditarCand.css">
  </head>
  <body>
    <div id="imagem">
        <img src="https://i.ibb.co/tDQNMNp/weblogo.png" width=180 height=120>
    </div>
  <div id="menu">     
            <ul>
                <li><a>Perfil</a>
                    <ul>
                        <li><a href="editarCandidato.php">Editar</a></li>
                        <li><a href="deletarCandidato.php">Excluir</a></li>
                        <li><a href="sairCandidato.php">SAIR</a></li>
                    </ul>
                </li>
                <li><a href="areaPrivadaCandidato.php">Pesquisar Vagas</a></li>
                <li><a href="quemSomos.php">Quem Somos</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>

    <div id="corpo-form-Cad">
          <h1>Editar Candidato</h1>
          <?php $rows_candidato = mysqli_fetch_assoc($resultado_candidato) ?>
          <form method="POST"> 
            <input type="text" name="nome" placeholder="Nome da Empresa" maxlength="30" value =  <?php echo $rows_candidato['nome']; ?>>
            <input type="hidden" name="cpf" placeholder="CPF" maxlength="11" value =  <?php echo $rows_candidato['cpf']; ?>>
            <input type="text" name="curso" placeholder="Curso" maxlength="30" value =  <?php echo $rows_candidato['curso']; ?>>
            <input type="text" name="instituicao" placeholder="Instituição" maxlength="40" value =  <?php echo $rows_candidato['instituicao']; ?>>
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30" value =  <?php echo $rows_candidato['telefone']; ?>>
            <input type="hidden" name="email" placeholder="email" maxlength="40" value =  <?php echo $rows_candidato['email']; ?>>
            <input type="password" name="senha" placeholder="Senha" maxlength="15" >
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="EDITAR">
           
          </form>
        </div>

<?php

//verificar se clicou no botão
if(isset($_POST['nome'])){
  $nome = addslashes($_POST['nome']);
  $cpf = addslashes($_POST['cpf']);
  $curso = addslashes($_POST['curso']);
  $instituicao = addslashes($_POST['instituicao']);
  $telefone = addslashes($_POST['telefone']);
  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['confSenha']);;

  //verificar se esta preenchido
 
    $m->conectar("web_estagio", "localhost","root","");
    
     if($senha == $confirmarSenha){
        if($m->editar($nome,$cpf, $curso, $instituicao ,$telefone, $email, $senha)){
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