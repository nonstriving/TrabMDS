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
  $result_vagas = "SELECT * FROM cadastrovaga INNER JOIN vagas ON id_vag = id_vagas";
  $resultado_vagas = mysqli_query($conn, $result_vagas);

 
  
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
                        <li><a href="editarEmpresa.php">Editar</a></li>
                        <li><a href="excluirEmpresa.php">Excluir</a></li>
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
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Vagas Oferecidas</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                
                <th>Cargo</th>
                <th>Área</th>
                <th>Cidade</th>
                <th>Ação</th>

          
              </tr>
            </thead>
            <tbody>
              <?php while($rows_vagas = mysqli_fetch_assoc($resultado_vagas)){ ?>
                
                <tr>
                  <?php

                  if($rows_vagas['id_emp'] == $_SESSION['id_empresa']){
              ?>
                  
                  <td><?php echo $rows_vagas['cargo']; ?></td>
                  <td><?php echo $rows_vagas['area']; ?></td>
                  <td><?php echo $rows_vagas['cidade']; ?></td>
                 
                  
                  <td>
                    <button method="POST" type="button" name="pesquisar"value="<?php echo $rows_vagas['id_cand'] ; ?>" class="btn btn-xs btn-warning"><a href="listarCandCadastrados.php?id=<?php echo $rows_vagas['id_cand'] ; ?>">Vizualizar Candidatos</button>
                    <button method="POST" type="button" name="pesquisar"value="<?php echo $rows_vagas['id_vagas'] ; ?>" class="btn btn-xs btn-warning"><a href="editarVaga.php?id=<?php echo $rows_vagas['id_vagas'] ; ?>">Editar</button>
                    <button method="POST" type="button" name="pesquisar"value="<?php echo $rows_vagas['id_vagas'] ; ?>" class="btn btn-xs btn-warning"><a href="deletarVaga.php?id=<?php echo $rows_vagas['id_vagas'] ; ?>">Excluir</button>
                  </td>
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