<?php
  session_start();
    //echo $_SESSION['id_empresa'];
  if(!isset($_SESSION['id_empresa'])){
    header("location: index.php");
    exit;
  }
?>
<?php
    require_once 'classes/vagas.php';
    $v = new vagas;
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <title> Web Estágio</title>
       <link rel="stylesheet" href="css/estiloCad.css">
   </head>

   <body>
   <div id="menu">     
            <ul>
                <li><a>Perfil</a>
                    <ul>
                        <li><a href="editarEmpresa.php">Editar</a></li>
                        <li><a href="excluirExcluir.php">Excluir</a></li>
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
      <h1>Cadastrar Vaga</h1>
      <form method="POST">
       
        <input type="text" name="descricao" placeholder="Descrição" maxlength="200">
        <input type="text" name="cidade" placeholder="Cidade" maxlength="30">
        <input type="text" name="estado" placeholder="Estado" maxlength="30">
        <input type="text" name="area" placeholder="Área" maxlength="30">
        <input type="text" name="curso" placeholder="Curso" maxlength="30">
        <input type="text" name="cargo" placeholder="Cargo" maxlength="30">
        <input type="submit" value="CADASTRAR">
       
			</form>
    </div>

<?php

//verificar se clicou no botão
if(isset($_POST['area'])){
  $id_emp = ($_SESSION['id_empresa']);
  
  $descricao = addslashes($_POST['descricao']);
  $cidade = addslashes($_POST['cidade']);
  $estado = addslashes($_POST['estado']);
  $area = addslashes($_POST['area']);
  $curso = addslashes($_POST['curso']);
  $cargo = addslashes($_POST['cargo']);

//verificar se esta preenchido
  if(!empty($descricao) && !empty($cidade) && !empty($estado) && !empty($area) && !empty($curso) && !empty($cargo)){
    $v->conectar("web_estagio", "localhost","root","");
    
      
        if($v->cadastrar($id_emp, $descricao,$cidade,$estado,$area,$curso,$cargo)){
          ?>
          <div id="msg-sucesso">
          Cadastrado com sucesso! Acesse para Entar
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