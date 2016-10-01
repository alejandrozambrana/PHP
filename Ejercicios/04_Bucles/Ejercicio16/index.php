<!DOCTYPE html>
<!--
Ejercicio 16
Escribe un programa que diga si un número introducido por teclado es o no primo. Un número
primo es aquel que sólo es divisible entre él mismo y la unidad.
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
      <h1>Numero Primo</h1>
      <?php
        $numero = $_GET['numero'];
        
        if(!isset($numero)){//mira que la variable $numero no este definida
      
      ?>
      
          <form action="index.php" method="GET">
            <label for="numero">¿Cuantos numeros quieres ver?</label>
            <input type="number" name="numero" id="numero" step="1" autofocus>
            <input type="submit" value="Aceptar">
          </form> 
      <?php
        } else {
          $esPrimo = true;
          
          //comprueba si el numero es primo
          for ($x = 2; $x < $numero; $x++) {
              if(($numero % $x) == 0){
               $esPrimo = false;
              } 
          }
          
          // hace que el 0 y el 1 no sean primos
          if (($numero == 0) || ($numero == 1)) {
            $esPrimo = false;
          }
          
          if($esPrimo){
            echo "El numero ", $numero, " es primo." ;
          } else {
            echo "El numero ", $numero, "  no es primo." ;
          }
        }
      ?>
    </div>
  </body>
</html>
