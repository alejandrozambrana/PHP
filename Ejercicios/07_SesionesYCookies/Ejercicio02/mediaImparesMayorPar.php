<?php
session_start();// Inicia la sesión

if(!isset($_SESSION['n'])) {//comprueba que la variable no esta iniciada.
$_SESSION['n'] = 0;
$_SESSION['contador'] = -1;
$_SESSION['contadorImpares'] = 0;
$_SESSION['suma'] = 0;
$_SESSION['mediaImpares'] = 0;
$_SESSION['mayorPar'] = -PHP_INT_MAX;
}

?>
<!DOCTYPE html>
<!--
Ejercicio 2
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares. El
número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
en el cómputo. Utiliza sesiones.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    if($_GET['n'] >= 0){
      
      $_SESSION['contador']++;
      
      if($_GET['n'] % 2 != 0){
        $_SESSION['contadorImpares']++;
        $_SESSION['suma'] = $_SESSION['suma'] + $_GET['n'];
        $_SESSION['media'] = $_SESSION['suma'] / $_SESSION['contadorImpares'];
      }else{
        if($_SESSION['mayorPar'] < $_GET['n']){
          $_SESSION['mayorPar'] = $_GET['n'];
        }
      }
      
    ?>
    <h1>Introduce un numero para terminar introduce un numero negativo</h1>
    <form action="mediaImparesMayorPar.php" method="GET">
      <input type="number" name="n" id="numeroId"   step="1" autofocus>
      <input type="submit" value="Continuar">
    </form>
    
    <?php
    } else {
      
      echo "La cantidad de numeros introducidos es: ", $_SESSION['contador'], "</br>";
      echo "La media de los impares es: ", $_SESSION['media']  , "</br>";
      echo "El mayor de los pares es: ", $_SESSION['mayorPar'];
      session_destroy();
      echo "</br><a href=\"mediaImparesMayorPar.php\" >>>Volver</a>";
    }
    ?>
  </body>
</html>
