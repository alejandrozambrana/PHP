<?php
session_start();// Inicia la sesión

if(!isset($_SESSION['n'])) {//comprueba que la variable no esta iniciada.
$_SESSION['n'] = 0;
$_SESSION['contador'] = -1;
$_SESSION['suma'] = 0;
}

?>
<!DOCTYPE html>
<!--
Ejercicio 3
Escribe un programa que permita ir introduciendo una serie indeterminada de números mientras
su suma no supere el valor 10000. Cuando esto último ocurra, se debe mostrar el total acumulado,
el contador de los números introducidos y la media. Utiliza sesiones.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
      $_SESSION['contador']++;
      $_SESSION['suma'] = $_SESSION['suma'] + $_GET['n'];

    if($_SESSION['suma'] < 10000){

    ?>
    <h1>Introduce un numero para terminar introduce un numero negativo</h1>
    <form action="sumaNoSuperiorA10000.php" method="GET">
      <input type="number" name="n" id="numeroId"   step="1" autofocus>
      <input type="submit" value="Continuar">
    </form>
    
    <?php
    } else {
      echo "La suma de los numeros introducidos es: ", $_SESSION['suma'], "</br>";
      echo "La cantidad de numeros introducidos es: ", $_SESSION['contador'], "</br>";
      session_destroy();
      echo "</br><a href=\"sumaNoSuperiorA10000.php\" >>>Volver</a>";
    }
    ?>
  </body>
</html>
