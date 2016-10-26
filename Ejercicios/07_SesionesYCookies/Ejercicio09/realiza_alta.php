<?php
error_reporting(E_ALL ^ E_NOTICE); //no muestra error de variables indefinida
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
      $codigo = $_GET['codigo'];
      $nombreIntroducido = $_GET['nombre'];
      $precioIntroducido = $_GET['precio'];
      $detallesIntroducido = $_GET['detalle'];
      $imagenIntroducido = $_GET['imagen'];
      $_SESSION['articulos'][$codigo]['nombre'] = $codigo;
      $_SESSION['articulos'][$codigo]['equipo'] = $nombreIntroducido;
      $_SESSION['articulos'][$codigo]['precio'] = $precioIntroducido;
      $_SESSION['articulos'][$codigo]['Detalles'] = $detallesIntroducido;
      $_SESSION['articulos'][$codigo]['imagen'] = $imagenIntroducido;
      
      header("Refresh: 0; url=index.php");//esto redirecciona a otra pagina
    ?>
  </body>
</html>
