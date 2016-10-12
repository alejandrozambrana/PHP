<!DOCTYPE html>
<!--
Ejercicio 15
Realiza un programa que sea capaz de rotar todos los elementos de una matriz cuadrada una posición
en el sentido de las agujas del reloj. La matriz debe tener 12 filas por 12 columnas y debe contener
números generados al azar entre 0 y 100. Se debe mostrar tanto la matriz original como la matriz
resultado, ambas con los números convenientemente alineados.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>   
    <style>
      
    </style>
  </head>
  <body>
    <?php    
      //crea array original
      for($filas = 0; $filas < 12; $filas++){
        for($columnas = 0; $columnas < 12; $columnas++){
         $matrizOriginal[$filas][$columnas] = rand(0, 100);
        }
      }
      
      //Muestra matriz original
      echo "<h1>Matriz Original</h1>";
      echo "<table>";
      for($filas = 0; $filas < 12; $filas++){
        echo "<tr>";
        for($columnas = 0; $columnas < 12; $columnas++){
          echo "<td style=\"padding: 5px;\">", $matrizOriginal[$filas][$columnas], "</td>";
        }
        echo "</tr>";
      }
       echo "</table>";
       
      //Rota el array
       $contador = 0;
       $auxDos = 0;

        for ($j = 1; $j <= 6; $j++) {
            
            //Rota línea superior
            $auxUno = $matrizOriginal[0 + $contador][11 - $contador];
            $x = 0 + $contador;
            for ($i = (11 - $contador); $i > $contador; $i--) {
                $matrizOriginal[$x][$i] = $matrizOriginal[$x][$i - 1];
            }      
             
            //Rota línea derecha
            $auxUno = $matrizOriginal[11 - $contador][11 - $contador];
            $i = 11 - $contador;
            for ($x = (11 - $contador); $x > $contador; $x--) {
                $matrizOriginal[$i][$x] = $matrizOriginal[$i - 1][$x];
            } 
             $matrizOriginal[1 + $contador][11 - $contador] = $auxUno;
            
            //Rota línea baja
            $auxUno = $matrizOriginal[11 - $contador][0 + $contador];
            $x = 11 - $contador;
            for ($i = (0 + $contador); $i < (11 - $contador); $i++) {
                $matrizOriginal[$x][$i] = $matrizOriginal[$x][$i + 1];
            } 
             $matrizOriginal[11 - $contador][10 - $contador] = $auxUno;
             
            //Rota línea izquierda
            $i = 0 + $contador;
            for ($x = (0 + $contador); $x < (11 - $contador); $x++) {
                $matrizOriginal[$x][$i] = $matrizOriginal[$x + 1][$i];
            } 
            $matrizOriginal[10 - $contador][0 + $contador] = $auxUno;
             
            //Aumenta el contador
            $contador++;
        }
        
      //Muestra matriz original
      echo "<h1>Matriz Modificada</h1>";
      echo "<table>";
      for($filas = 0; $filas < 12; $filas++){
        echo "<tr>";
        for($columnas = 0; $columnas < 12; $columnas++){
          echo "<td style=\"padding: 5px;\">", $matrizOriginal[$filas][$columnas], "</td>";
        }
        echo "</tr>";
      }
       echo "</table>";
    ?>
  </body>
</html>
