<?php
session_start(); // Inicia la sesión

if(!isset($_SESSION['n'])) {//comprueba que la variable no esta iniciada.
$_SESSION['n'] = 0;
$_SESSION['contador'] = -1;
$_SESSION['suma'] = 0;
$_SESSION['media'] = 0;
}

?>

<!DOCTYPE html>
<!--
Ejercicio 1
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo. Utiliza sesiones.
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
    
      $_SESSION['suma'] = $_SESSION['suma'] + $_GET['n'];
      
      $_SESSION['media'] = $_SESSION['suma'] / $_SESSION['contador'];
      
    ?>
    <h1>Introduce un numero para terminar introduce un numero negativo</h1>
    <form action="mediaNumerosIntroducidos.php" method="GET">
      <input type="number" name="n" id="numeroId"   step="1" autofocus>
      <input type="submit" value="Continuar">
    </form>

    <?php
    } else {
 
     echo "La media de los numeros es: ", $_SESSION['media']; 
     session_destroy();
     
    }
    
    ?>
  </body>
</html>
