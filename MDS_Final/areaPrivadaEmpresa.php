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
 <?php $rows_empresa = mysqli_fetch_assoc($resultado_empresa);

 ?>
  

  


<!DOCTYPE html>
<html>
    <head>
        <title> Web Estágio </title>
        <link rel="stylesheet" href="css/estiloPrincipal.css">
       
    </head> 
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
                
                <li><a href="quemSomosEmpresa.php">Quem Somos</a></li>
                <li><a href="areaPrivadaEmpresa.php">Home</a></li>
            </ul>
        </div>
    <body>
     <div id="imagem">
        <img src="https://i.ibb.co/tDQNMNp/weblogo.png" width=180 height=120>
    </div>
    <div id="botao">
       <a href="criarVaga.php" class="botaoCandidato">CRIAR UMA VAGA</a>
        <a href="verificarVagas.php" class="botaoEmpresa">VERIFICAR VAGAS</a>
   </div>

</body>
</html>
