<!DOCTYPE html>
<!--
Ejercicio 6
Muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle do-while .
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $numeros = 320;
    do{
      echo $numeros , " ";
      $numeros = $numeros - 20;
    }while ($numeros != 140);
    ?>
  </body>
</html>
