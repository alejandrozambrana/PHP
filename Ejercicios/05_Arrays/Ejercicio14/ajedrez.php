<!DOCTYPE html>
<!--
Ejercicio 14
Escribe un programa que, dada una posición en un tablero de ajedrez, nos diga a qué casillas podría
saltar un alfil que se encuentra en esa posición. Indícalo de forma gráfica sobre el tablero con un
color diferente para estas casillas donde puede saltar la figura. El alfil se mueve siempre en diagonal.
El tablero cuenta con 64 casillas. Las columnas se indican con las letras de la “a” a la “h” y las filas
se indican del 1 al 8.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>   
    <style>
      #negro{
        background-color: black;
        padding: 10px;
      }
      #blanco{
        background-color: white;
        padding: 10px;
      }
      
      #alfil{
        background-color: red;
      }
     
      #movimientoAlfil{
        background-color: orange;
      }
      
      table, th, td {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php
    $coordenadaX = $_GET['coordenadaX'];
    $coordenadaY = $_GET['coordenadaY'];
    $coordenadaXInteger = ord($coordenadaX) - ord('a');//convierte la letra en numero mediante el codigo ascii
    $movimientoAlfil = "movimientoAlfil";
    $alfil = "alfil";
    $color = "blanco";
    
      echo '<table><tr>';
      echo '<td></td> <td>a</td> <td>b</td> <td>c</td> <td>d</td> <td>e</td> <td>f</td> <td>g</td> <td>h</td> <td></td> </tr>';
      for($y = 0; $y < 8; $y++){
        echo '<tr><td style="text-align: right;">'.(0 + $y).'</td>';
        for($x = 0; $x < 8; $x++){
          echo "<td id=\"$color\">";
          
         if(($coordenadaXInteger == $x) &&($coordenadaY == $y)){// si las cordenadas son iguales a la introducidas pinta al alfil
            echo '<img src="alfil.png">';
          } else if (abs($coordenadaXInteger - $x) == abs($coordenadaY - $y)){ //si a la cordenadas le restamos la introducidas nos da los movimientos que podemos hacer
            echo '<img src="punto.png" style="width: 60px; height:40px;">';
          } else {
            echo '<img src="vacio.png">';
          }
          echo "</td>";
          
          //cambia el color de cada casilla de las columnas
          if($color == "blanco"){
            $color = "negro";
          } else {
            $color = "blanco";
          }
        }
        //cambia el color de las filas para que no cuincida con las columnas
        if($color == "blanco"){
            $color = "negro";
          } else {
            $color = "blanco";
          }
        echo '<td style="text-align: left; ">'.(0 + $y).'</td></tr>';
      }
      echo '<tr><td></td> <td>a</td> <td>b</td> <td>c</td> <td>d</td> <td>e</td> <td>f</td> <td>g</td> <td>h</td> <td></td> </tr>';
    ?>
    </table>
    
    <h3>Encuentra al alfil Introduce una cordenada</h3>
    <form action="ajedrez.php" method="get">
      cordenada X:
      <input type="text" name="coordenadaX" autofocus required><br>
      cordenada Y:
      <input type="text" name="coordenadaY" required><br>
      <input type="submit" value="Aceptar">
    </form>
  </body>
</html>
