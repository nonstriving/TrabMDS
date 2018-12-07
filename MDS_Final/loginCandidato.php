<?php
    require_once 'classes/candidato.php';
    $c = new candidato;
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <title> Web Estágio</title>
       <link rel="stylesheet" href="css/estiloLog.css">
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
            <div id="corpo-form">
              <h1>Entrar como Candidato</h1>
              <form method="POST"> 
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit" value="ACESSAR">
                <a href="cadastrarCandidato.php">Ainda não é inscrito?   <strong>Cadastre-se</strong></a>
              </form>
        </div>
        
    <?php

    //verificar se clicou no botão
    if(isset($_POST['email'])){
      $email = addslashes($_POST['email']);
      $senha = addslashes($_POST['senha']);
     
     //verificar se esta preenchido
      if(!empty($email) && !empty($senha)){
        $c->conectar("web_estagio", "localhost","root","");
      
        if($c->logar($email, $senha)){
          //encaminhar para area privada
          header("location: areaPrivadaCandidato.php");

        }
        else{
          ?>
              <div class="msg-erro">
              Email e/ou Senha estão incorretos!
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