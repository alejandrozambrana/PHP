<!DOCTYPE html>
<!--
Ejercicio 10
Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ecuacion 2 grado</title>
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
          <p>Ejemplo de ecuacion: ax2 + bx + c = 0</p>
          <form action="index.php" method="get">
            <label for="a">Introduze el valor de la A:</label>
            <input type="number" id="a" name="a" min="0" step="1" autofocus><br>
            <label for="b">Introduze el valor de la B:</label>
            <input type="number" id="b" name="b" min="0" step="1" autofocus></br>
            <label for="c">Introduze el valor de la C:</label>
            <input type="number" id="a" name="c" min="0" step="1" autofocus><br></br>
            <input type="submit" value="calcular">
          </form></br>
          <?php
            if(isset($_GET['a'])){

              $valorA = $_GET['a'];
              $valorB = $_GET['b'];
              $valorC = $_GET['c'];
              
              if (($valorA == 0) && ($valorB == 0) && ($valorC == 0)){
               echo "La ecuacion tiene soluciones infinitas";
              }

              if (($valorA == 0) && ($valorB == 0) && ($valorC != 0)){
                echo "La ecuación no tiene solución.";
              }
              if (($valorA != 0) && ($valorB != 0) && ($valorC == 0)) {
                echo "x1 = 0 </br>";
                echo "x2 = ", (-$valorB / $valorA), "</br>";
              }
              if (($valorA == 0) && ($valorB != 0) && ($valorC != 0)) {
                echo "x1 = x2 = ", (-$valorC / $valorB), "</br>";
              }
              if (($valorA != 0) && ($valorB != 0) && ($valorC != 0)) {	

                $discriminante = $valorB*$valorB - (4 * $valorA * $valorC);

                if ($discriminante < 0) {
                    echo "La ecuación no tiene soluciones reales";
                } else {
                  echo "x1 = ", (-$valorB + sqrt($discriminante))/(2 * $valorA ), "</br>";
                  echo "x2 = ", (-$valorB - sqrt($discriminante))/(2 * $valorA ), "</br>";
                }
              }
            }
          ?>
        </div>
    </body>
</html>
