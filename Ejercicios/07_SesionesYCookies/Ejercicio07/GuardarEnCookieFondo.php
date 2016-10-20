<?php
if(!isset($_COOKIE['color'])){
  $color = "red";
} else {
  $color = $_COOKIE['color'];
 
}

if(isset($_GET['color'])){
  $color = $_GET['color'];
   setcookie("color", $color, time() + 20);
}

?>
<!DOCTYPE html>
<!--
Ejercicio 7
Escribe un programa que guarde en una cookie el color de fondo (propiedad background-color) de
una página. Esta página debe tener únicamente algo de texto y un formulario para cambiar el color.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <style>
    body{
      background-color: <?=$color?>;
    }
  </style>
  <body>
    <?php
    
    ?>
    <h1>Guarda Color de Fondo en las Coookies</h1>
    <form action="GuardarEnCookieFondo.php" method="GET">
      <input type="color" name="color" id="colorId">
      <input type="submit" value="Cambiar Fondo">
    </form>
    <p>Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto 
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto 
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto 
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto 
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto 
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto
    Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto Texto</p>
    <?php
    
    ?>
  </body>
</html>
