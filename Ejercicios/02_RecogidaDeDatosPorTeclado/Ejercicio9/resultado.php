<!DOCTYPE html>
<!--
Ejercicio 9
Escribe un programa que calcule el volumen de un cono mediante la fórmula V = 1
3r2h.
-->
<html>
    <head>
      <meta charset="UTF-8">
      <title>Resultado</title>
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
          $radio = $_GET['radio'];
          $altura = $_GET['altura'];
          $resultado = (1 / 3) * pi() * $radio * $radio * $altura;
          echo "<p>El volumen del cono con <b>radio </b>" ,$radio, " y <b>altura </b> ";
          echo $altura, "es de: <b>" ,round($resultado, $precision = 2), " cm<sup>2</sup></b></p>";
        ?>
        </br></br>
        <a href="index.php">Volver</a>
      </div>
    </body>
</html>
