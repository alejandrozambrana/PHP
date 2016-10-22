<?php
session_start();// Inicia la sesión

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    if(!isset($_GET['español']) && !isset($_GET['ingles'])){
    ?>
      <h1>Introduce la palabra nueva</h1>
      <form action="anadirPalabraDiccionario.php" method="GET">
        Palabra en Español<input type="text" name="espanol" id="palabraId">
        Palabra en Ingles<input type="text" name="ingles" id="palabraId">
        <input type="submit" value="Continuar">
      </form>
    <?php
    } else {
      $espanol = $_GET['espanol'];
      $ingles = $_GET['ingles'];
      
      $_SESSION['diccionario'][$espanol] = $ingles; //añade una palabra nueva
      
      header("Refresh: 0; url=diccionarioCookie.php");//esto redirecciona a otra pagina
    }
    ?>
  </body>
</html>
