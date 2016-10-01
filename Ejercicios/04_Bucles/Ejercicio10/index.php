<!DOCTYPE html>
<!--
Ejercicio 10
Escribe un programa que calcule la media de un conjunto de números positivos introducidos por
teclado. A priori, el programa no sabe cuántos números se introducirán. El usuario indicará que ha
terminado de introducir los datos cuando meta un número negativo.
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
      <h1>Introduce numeros.</h1>
      <p>Para parar de meter numero introduce un numero negativo.</p>
      <?php
          $numero = $_GET['numero'];
          $sumaNumero = $_GET['sumaNumero'];
          $contador = $_GET['contador'];
        
        if (!isset($numero) || ($numero > 0)) {//mira que la variable $numero no este definida o sea mayor que sea numero positivo
          $sumaNumero = $sumaNumero + $numero;
          $contador++;
      ?>
          <form action="index.php" method="GET">
            <input type="number" name="numero" autofocus>
            <input type="hidden" name="sumaNumero" value="<?php echo $sumaNumero ; ?>">
            <input type="hidden" name="contador" value="<?php echo $contador ; ?>">
            <input type="submit" value="Aceptar">
          </form>  
      <?php
        } else {
      ?>
          <br><br> La media de los números introducidos es <?php echo $sumaNumero / ($contador - 1)?>
          <br><br>
      <?php
        }
      ?>
     
    </div>
  </body>
</html>
