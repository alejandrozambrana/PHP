<!DOCTYPE html>
<!--
4. Crea un array bidimensional de 10 filas por 9 columnas relleno con números aleatorios entre 1 y 1000 (ambos
incluidos). Los números se pueden repetir. Se deben mostrar todos los números bien alineados en filas y columnas.
Muestra el máximo de entre los números capicúa en azul y los números adyacentes en verde. Si el máximo capicúa
se repite, se puede colorear uno cualquiera de ellos o todos, como al alumno le resulte más fácil.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $arrayBidi = [];
    $maximo = -PHP_INT_MAX;
    
    //mete los numeros en la matriz
    for($filas = 0; $filas < 10 ; $filas++){
      for($columnas = 0; $columnas < 9; $columnas++){
        $arrayBidi[$filas][$columnas] = rand(1, 1000);
      }
    }
     
    //comprueba cual es el capicua maximo
    for($filas = 0; $filas < 10 ; $filas++){
      for($columnas = 0; $columnas < 9; $columnas++){
        //voltea el numero
        $x = $arrayBidi[$filas][$columnas];
        $reves = 0;
        do {
          $reves = ($reves * 10) + ($x % 10);
          $x = floor($x / 10); //con floor redondeamos a la baja
        } while ($x > 0);
        
        //cumprueba quue el numero original sea igual al numero volteado si es igual es que es capicua
        if($reves == $arrayBidi[$filas][$columnas]){
          if($arrayBidi[$filas][$columnas] > $maximo){//mete el capicua mas grande en la variable maximo
            $maximo = $arrayBidi[$filas][$columnas];
            $coordenadaFilas = $filas; //coje las cordenadas de el maximo
            $coordenadaColumna = $columnas;//coje las cordenadas de el maximo
          }
        } 
      }
    }

    //muestra array
    echo "<h1>Matriz</h1>";
    echo "<table>";
    for($filas = 0; $filas < 10 ; $filas++){
      echo "<tr>";
      for($columnas = 0; $columnas < 9; $columnas++){
        if($arrayBidi[$filas][$columnas] == $maximo){ //si es el maximo lo pinta de azul y si es ayacente de verde y sino no hace nada solo muestra
          echo '<td> <span style="color: blue; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if(($filas == $coordenadaFilas + 1) &&($columnas == $coordenadaColumna)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if (($filas == $coordenadaFilas - 1) &&($columnas == $coordenadaColumna - 1)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if (($filas == $coordenadaFilas - 1) &&($columnas == $coordenadaColumna + 1)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if (($filas == $coordenadaFilas + 1) &&($columnas == $coordenadaColumna - 1)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if (($filas == $coordenadaFilas + 1) &&($columnas == $coordenadaColumna + 1)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if (($filas == $coordenadaFilas - 1) &&($columnas == $coordenadaColumna)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if (($filas == $coordenadaFilas) &&($columnas == $coordenadaColumna - 1)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else if (($filas == $coordenadaFilas) &&($columnas == $coordenadaColumna + 1)){
          echo '<td> <span style="color: green; font-weight:bold;">', $arrayBidi[$filas][$columnas], '</span></td>';
        } else {
          echo "<td> ", $arrayBidi[$filas][$columnas], "</td> ";
        }
      }
      echo "</tr>";
    }
     echo "</table>";
    ?>
  </body>
</html>
