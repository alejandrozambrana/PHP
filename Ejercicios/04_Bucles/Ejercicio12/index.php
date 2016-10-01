<!DOCTYPE html>
<!--
Ejercicio 12
Escribe un programa que muestre los n primeros términos de la serie de Fibonacci. El primer término
de la serie de Fibonacci es 0, el segundo es 1 y el resto se calcula sumando los dos anteriores, por lo
que tendríamos que los términos son 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144… El número n se debe
introducir por teclado.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        background-color: #ffffcc;
      }
      #contenedor{
        width: 100%;
        margin: auto; 
        text-align: center;
      }
      
    </style>
  </head>
  <body>
    <div id="contenedor">
      <h1>Fibonacci</h1>
      <?php
        $numero = $_GET['numero'];
        
        if(!isset($numero)){//mira que la variable $numero no este definida
      
      ?>
      
          <form action="index.php" method="GET">
            <label for="numero">¿Cuantos numeros quieres ver?</label>
            <input type="number" name="numero" id="numero" step="1" min="2" autofocus>
            <input type="submit" value="Aceptar">
          </form> 
      <?php
        } else {
          $n1 = 0;
          $n2 = 1;
          $suma = 0;
          echo "0 1 ";
          for($i = 0; $i < $numero - 2; $i++){
            $suma = $n1 + $n2;
            $n1 = $n2;
            $n2 = $suma;
            echo $suma, " ";
          }
        }
      ?>
    </div>
  </body>
</html>
