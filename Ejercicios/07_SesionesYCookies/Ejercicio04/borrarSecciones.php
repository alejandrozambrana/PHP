<?php
session_start();// Inicia la sesión
$_SESSION['logeado'] = true;
?>
<!DOCTYPE html>
<!--
borra las secciones
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    session_destroy();
    header("Refresh: 0; url=ControlDeAcceso.php");
    ?>
  </body>
</html>
