<!DOCTYPE html>
<!--
Ejercicio 13
Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos comprendi-
dos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede
repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se
cumplan los siguientes requisitos:
• Los números de las dos diagonales donde está el mínimo deben aparecer en color verde.
• El mínimo debe aparecer en color azul.
• El resto de números debe aparecer en color negro.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>    
  </head>
  <body>
    <?php
    $arrayBidimencional = [][];
      for($i = 0; $i < 9; $i++){
        for($x = 0; $x < 6; $x++){
          $arrayBidimencional[$i][$x] = rand(100, 999);
        }
      }
      for($i = 0; $i < 9; $i++){
        for($x = 0; $x < 6; $x++){
        echo $arrayBidimencional[$i][$x];
        }
      }
       echo "Antonio gay";
    ?>
  </body>
</html>
