<?php
    session_start();
    //echo $_SESSION['id_empresa'];
    if(!isset($_SESSION['id_empresa'])){
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

    <div class="h2">
        <h2> 
        A missão do nosso site <strong> Web Estágio </strong> é fornecer oportunidades para candidatos que buscam uma colocação no mercado de trabalho e também ajudar as empresas a encontrar bons profissionais. 
        Fundada em 2018 por um grupo de estudantes, ainda durante a graduação, na cidade de São Carlos.
        </h2>
    </div>

</body>
</html>
