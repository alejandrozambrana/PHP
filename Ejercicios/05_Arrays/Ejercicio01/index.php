<!DOCTYPE html>
<!--
Ejercicio 1
Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      div{
        display: inline-block;
      }
    </style>
    
  </head>
  <body>
    <?php
      for ($i = 0; $i < 20; $i++) {
        // números aleatorios entre 0 y 20 (ambos incluidos)
        $numero[$i] = rand(0, 100);
        $cuadrado[$i] = $numero[$i] * $numero[$i];
        $cubo[$i] = $numero[$i] * $numero[$i] * $numero[$i];
      }

      echo "<div><b>Numero:</b> </br>";
      foreach ($numero as $elemento) {
        echo $elemento, "<br>";
      }
      echo "</div>";
      
      echo "<div><b>Cuadrado:</b> </br>";
      foreach ($cuadrado as $elemento) {
        echo $elemento, "<br>";
      }
      echo "</div>";
      
      echo "<div><b>Cubo:</b> </br>";
      foreach ($cubo as $elemento) {
        echo $elemento , "<br>";
      }
      echo "</div>";
    ?>
  </body>
</html>
