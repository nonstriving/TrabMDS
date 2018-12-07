<?php
	session_start();
	if(!isset($_SESSION['id_candidato'])){
		header("location: index.php");
		exit;
	}



?>

<?php
 include_once("conexaoBD.php");

	$pesquisar = $_POST['pesquisar'];
	$result_vagas = "SELECT * FROM vagas WHERE curso LIKE '%$pesquisar%' or cidade LIKE '%$pesquisar%' LIMIT 20";
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
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Vagas Disponíveis</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Cargo</th>
                <th>Curso</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Ação</th>

          
              </tr>
            </thead>
            <tbody>
              <?php while($rows_vagas = mysqli_fetch_assoc($resultado_vagas)){ ?>
                 <div class="modal fade" id="myModal<?php echo $rows_vagas['id_vagas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_vagas['cargo']; ?></h4>
                      </div>
                      <div class="modal-body">
                        <p>Descrição:  <?php echo $rows_vagas['descricao']; ?></p>
                        <p>Curso:  <?php echo $rows_vagas['curso']; ?></p>
                        <p>Cidade:  <?php echo $rows_vagas['cidade']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <tr>
                  <td><?php echo $rows_vagas['cargo']; ?></td>
                  <td><?php echo $rows_vagas['curso']; ?></td>
                  <td><?php echo $rows_vagas['cidade']; ?></td>
                  <td><?php echo $rows_vagas['estado']; ?></td> 
                  
                  <td>

                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_vagas['id_vagas']; ?>">Descrição</button>
                    <button method="POST" type="button" name="pesquisar"value="<?php echo $rows_vagas['id_vagas'] ; ?>" class="btn btn-xs btn-warning"><a href="cadastrarCadastroVaga.php?id=<?php echo $rows_vagas['id_vagas'] ; ?>">Cadastrar</button>
                    
                  </form>
                  </td>
                </tr>
                <!-- Inicio Modal -->
               
              <?php } ?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>
    <?php
      if(isset($_POST['pesquisar'])){

      }
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>