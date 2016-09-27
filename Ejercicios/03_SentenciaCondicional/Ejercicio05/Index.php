<!DOCTYPE html>
<!--
Ejercicio 5
Realiza un programa que resuelva una ecuación de primer grado (del tipo ax + b = 0).
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ecuacion 1 grado</title>
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
          <h1>Ecuacion de primer grado</h1>
          <p>Ejemplo de ecuacion: ax + b = 0</p>
          <form action="index.php" method="get">
            <label for="a">Introduze el valor de la A:</label>
            <input type="number" id="a" name="a" min="0" step="1" autofocus><br>
            <label for="b">Introduze el valor de la B:</label>
            <input type="number" id="b" name="b" min="0" step="1" autofocus></br></br>
            <input type="submit" value="calcular">
          </form></br>
          <?php
            if(isset($_GET['a'])){

              $valorA = $_GET['a'];
              $valorB = $_GET['b'];

              if ( $valorA == 0) {
                echo "No tiene solucion.";
              } else {
                echo "X =", (-$valorB/$valorA);
              }
            }
          ?>
        </div>
    </body>
</html>
