<!DOCTYPE html>
<!--
Ejercicio 5
Escribe un programa que calcule el área de un rectángulo.
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
          $altu = $_GET['altura'];
          $anchu = $_GET['anchura'];
          $resultado= $anchu * $altu;
          echo "<p>El area del rectangulo con <b>altura</b> $altu y <b>anchura</b> $anchu es de:<b> $resultado cm<sup>2</sup></b></p>";
        ?>
        </br></br>
        <a href="index.php">Volver</a>
      </div>
    </body>
</html>
