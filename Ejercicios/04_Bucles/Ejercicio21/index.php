<!DOCTYPE html>
<!--
Ejercicio 21
Realiza un programa que vaya pidiendo números hasta que se introduzca un numero negativo y
nos diga cuantos números se han introducido, la media de los impares y el mayor de los pares . El
número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye
en el cómputo.
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
      <?php
          $numero = $_GET['numero'];
          $sumaNumero = $_GET['sumaNumero'];
          $contador = $_GET['contador'];
          $contadorImpares = $_GET['contadorImpares'];
          $mayorPar = $_GET['mayorPar'];
        
        if (!isset($numero) || ($numero > 0)) {//mira que la variable $numero no este definida o sea mayor que sea numero positivo
          
          if ($numero % 2 != 0) {
           $sumaNumero = $sumaNumero + $numero;
           $contadorImpares++;
          }
          if($numero > $mayorPar){
            if ($numero % 2 == 0) {
              $mayorPar = $numero;
            }
          }
          $contador++;
      ?>
          <p>Para parar de meter numero introduce un numero negativo.</p>
          <form action="index.php" method="GET">
            <input type="number" name="numero" autofocus>
            <input type="hidden" name="sumaNumero" value="<?php echo $sumaNumero ; ?>">
            <input type="hidden" name="contador" value="<?php echo $contador ; ?>">
            <input type="hidden" name="contadorImpares" value="<?php echo $contadorImpares ; ?>">
            <input type="hidden" name="mayorPar" value="<?php echo $mayorPar ; ?>">
            <input type="submit" value="Aceptar">
          </form>  
      <?php
        } else {
      ?>
      <br><br> La <b>media</b> de los <b>números impares</b> introducidos es <b><?php echo $sumaNumero / ($contadorImpares)?></b>
      <br><br> Se han introducido <b><?php echo $contador - 1?></b> numeros
      <br><br> El <b>numero mayor par</b> es: <b><?php echo $mayorPar?></b>.
      <?php
        }
      ?>
          <br><br>
          <a href="index.php">>> Volver</a>
    </div>
  </body>
</html>
