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
 <?php $rows_candidato = mysqli_fetch_assoc($resultado_candidato) ?>
  

<!DOCTYPE html>
<html>
    <head>
        <title> Web Estágio </title>
       
		
        <link rel="stylesheet" href="css/areaCand.css">
       
    </head> 
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
                   
                
                <li><a href="quemSomosCandidato.php">Quem Somos</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    <body>
     <div id="imagem">
        <img src="https://i.ibb.co/tDQNMNp/weblogo.png" width=180 height=120>
    </div>
    
	<div id="pesquisar">
        <p>Pesquisar Vagas</p>
    
		<form method="POST" action="pesquisarVagas.php">
			<input type="text" name="pesquisar" placeholder="Digite o Curso ou a Cidade...">
			<input type="submit" value="ENVIAR">
		</form>
	</div>


    
</body>
</html>
