<!DOCTYPE html>
<!--
Ejercicio 3
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
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
          width: 40%;
          margin: auto; 
          text-align: center;
        }
      </style>
    </head>
    <body>
      <div id="contenedor">
        <?php
          $a = $_GET['pesetas'];
          $euro= 166.38;
          $pesetas= $a/ $euro;
          echo "<p>$a peseta es ", round($pesetas,2), "€ </p>";
        ?>
        </br></br>
        <a href="index.php">Volver</a>
      </div>
    </body>
</html>
