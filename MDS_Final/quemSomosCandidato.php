<?php
    session_start();
    if(!isset($_SESSION['id_candidato'])){
        header("location: index.php");
        exit;
    }



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Web Estágio </title>
        <link rel="stylesheet" href="css/test.css">

       
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

    <div class="h2">
        <h2> 
        A missão do nosso site <strong> Web Estágio </strong> é fornecer oportunidades para candidatos que buscam uma colocação no mercado de trabalho e também ajudar as empresas a encontrar bons profissionais. 
        Fundada em 2018 por um grupo de estudantes, ainda durante a graduação, na cidade de São Carlos.
        </h2>
    </div>

</body>
</html>
