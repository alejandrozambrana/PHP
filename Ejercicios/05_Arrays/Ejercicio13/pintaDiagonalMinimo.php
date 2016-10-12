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
    $arrayBidimencional = [];
    $minimo = PHP_INT_MAX;
      for($i = 0; $i < 6; $i++){
        for($x = 0; $x < 9; $x++){
          $numeroAleatorio = rand(100, 999);
          if(!in_array($numeroAleatorio, $arrayBidimencional)){//comprueba que los numeros no estan el array ya
            if($numeroAleatorio < $minimo ){//comprueba minimo
              $minimo = $numeroAleatorio;
              $minimoX = $x; //mete la posicion x del minimo en la variable
              $minimoI = $i; //mete la posicion I del minimo en la variable
            }
            $arrayBidimencional[$i][$x] = $numeroAleatorio;
          }
        }
      }
      
      //Muestra array bidimencional
      echo "<table>";
      for($i = 0; $i < 6; $i++){
        echo "<tr>";
        for($x = 0; $x < 9; $x++){
          if($arrayBidimencional[$i][$x] == $minimo){
            echo "<td><span style=\"color: blue; font-weight:bold;\">", $arrayBidimencional[$i][$x], "</span></td>";
          } else if (abs($x - $minimoX) == abs($i - $minimoI)){
            echo "<td><span style=\"color: green; font-weight:bold;\">", $arrayBidimencional[$i][$x], "</span></td>";
          } else {
            echo "<td>", $arrayBidimencional[$i][$x], "</td>";
          }
        }
        echo "</tr>";
      }
       echo "</table>";
    ?>
  </body>
</html>
