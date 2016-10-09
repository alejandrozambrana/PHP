<!DOCTYPE html>
<!--
Ejercicio 7
Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en
un array. El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del
array (del 0 en adelante) y todos los números impares a las celdas restantes. Utiliza arrays auxiliares
si es necesario.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      div{
        display: inline-block;
      }
      table, td{
        border: 1px solid black;
        border-collapse: collapse;
      }
      td{
        padding: 10px;
      }
    </style>
    
  </head>
  <body>
    <?php
      $arrayAleatorio = [];
      $arrayPares = [];
      $arrayImpares = [];
      $contadorPares = 0;
      $contadorImpares = 0;
      
      //si numerotexto no envia nada
      if(!isset($_GET['numeroTexto'])){
        //crea array aleatorio
        for($i = 0; $i < 20; $i++){
          $arrayAleatorio[$i] = rand(0, 100);
        }
        
        //pinta array Original
        echo "Array Original: ";
        echo "<table><tr>";
        //indice
        for($i = 0; $i < 20; $i++){ 
          echo "<td>" ,$i, "</td> ";
        }
        echo "</tr><tr>";
        //muestra el array 
        foreach ($arrayAleatorio as $num) {
          echo "<td>" ,$num, "</td> ";
        }
        echo "</tr></table></br>";
        
        
        foreach ($arrayAleatorio as $num) {
          if($num % 2 == 0){
            $arrayPares[$contadorPares] = $num;
            $contadorPares++;
          } else {
            $arrayImpares[$contadorImpares] = $num;
            $contadorImpares++;
          }
        }
        
        //mete en las primera posiciones los pares
        for($i = 0;$i < $contadorPares; $i++){
          $arrayAleatorio[$i] = $arrayPares[$i];
        }
        
        //mete en las ultimas posiciones los impares
        for($i = $contadorPares;$i < $contadorPares + $contadorImpares; $i++){
          $arrayAleatorio[$i] = $arrayImpares[$i - $contadorPares];
        }
      
        //pinta array con los pares alante y los pares atras
        echo "Array modificado: ";
        echo "<table><tr>";
        //indice
        for($i = 0; $i < 20; $i++){ 
          echo "<td>" ,$i, "</td> ";
        }
        echo "</tr><tr>";
        //muestra el array 
        foreach ($arrayAleatorio as $num) {
          echo "<td>" ,$num, "</td> ";
        }
        echo "</tr></table></br>";
        
      } 

    ?>
  </body>
</html>
