
<?php
    require_once 'classes/empresa.php';
    $m = new empresa;
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <title> Web Estágio</title>
       <link rel="stylesheet" href="css/cadastros.css">
   </head>

   <body>
   <div id="menu">     
            <ul>
                <li><a>Entrar</a>
                    <ul>
                        <li><a href="loginCandidato.php">Candidato</a></li>
                        <li><a href="loginEmpresa.php">Empresa</a></li>
                    </ul>
                </li>
                
                <li><a>Cadastre-se</a>
                    <ul>
                        <li><a href="cadastrarCandidato.php">Como Candidato</a></li>
                        <li><a href="cadastrarEmpresa.php">Como Empresa</a></li>
                    </ul>
                </li>
                
                <li><a href="quemSomos.php">Quem Somos</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    <div id="corpo-form-Cad">
      <h1>Cadastrar Empresa</h1>
      <form method="POST"> 
        <input type="text" name="nome" placeholder="Nome da Empresa" maxlength="30">
        <input type="text" name="CNPJ" placeholder="CNPJ" maxlength="14">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="email" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="CADASTRAR">
       
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
  if(!empty($nome) && !empty($CNPJ) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
    $m->conectar("web_estagio", "localhost","root","");
    
      if($senha == $confirmarSenha){
        if($m->cadastrar($nome,$CNPJ,$telefone,$email,$senha)){
          ?>
          <div id="msg-sucesso">
          Cadastrado com sucesso! Acesse para Entar
          </div>
          <?php
        }
        else{
          ?>
          
          <div class="msg-erro">
          Email já cadastrado!
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
  else{
      ?>
        <div class="msg-erro">
        Por Favor, Preencha todos os campos!
        </div>
      <?php
  }
}


?>
   </body>
</html>