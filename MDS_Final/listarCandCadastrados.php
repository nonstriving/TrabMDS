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
  $id_cand = $_GET['id'];
 
  
  $result_candidatos = "SELECT * FROM candidato where $id_cand = id_candidato";
  
  $resultado_candidatos = mysqli_query($conn, $result_candidatos);
  
?>



<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Estágio</title>
    <link href="estilo/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estiloVaga.css">
  </head>
  <body>
  <div id="menu">     
            <ul>
                <li><a>Perfil</a>
                    <ul>
                        <li><a href="#">Editar</a></li>
                        <li><a href="#">Excluir</a></li>
                        <li><a href="sairEmpresa.php">SAIR</a></li>
                    </ul>
                </li>
                
                <li><a>Vagas</a>
                    <ul>
                        <li><a href="criarVaga.php">Criar uma Vaga</a></li>
                        <li><a href="verificarVagas.php">Verficar Vagas</a></li>
                    </ul>
                </li>
                
                <li><a href="#">Quem Somos</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Candidatos Inscritos</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Nome Candidato</th>
                <th>Curso</th>
                

          
              </tr>
            </thead>
            <tbody>
              <?php while($rows_candidato = mysqli_fetch_assoc($resultado_candidatos)){ ?>
                <tr>
                  <?php

                  if($rows_candidato['id_candidato'] == $id_cand){
              ?>
                  
                  <td><?php echo $rows_candidato['nome']; ?></td>
                  <td><?php echo $rows_candidato['curso']; ?></td>
                  
                  
                  
                  <?php } ?>
                </tr>

              <?php } ?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>