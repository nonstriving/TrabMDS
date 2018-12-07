<?php
  session_start();
  if(!isset($_SESSION['id_candidato'])){
    header("location: index.php");
    exit;
  }



?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <title> Web Estágio</title>
       <link rel="stylesheet" href="css/sucesso.css">
   </head>

   <body>

    <div id="eba">
       <h1> PARABÉNS!  Inscrição realizada com Sucesso :) </h1>
    </div>
    <div id="botao">
        <button>
            <a href="areaPrivadaCandidato.php" class="botaoCandidato">VOLTAR</a>
           
        </button>
   </div>

  


   </body>
</html>