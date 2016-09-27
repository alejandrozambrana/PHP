<!DOCTYPE html>
<!--
Ejercicio 2
Realiza un programa que pida una hora por teclado y que muestre luego buenos días, buenas
tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 5.
respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben introducir por teclado.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Saludo</title>
        <style>
            body{
              background-color: #ffffcc;

            }
            #contenedor{
              width: 40%;
              margin: auto; 
              text-align: center;
            }
            #saludo{
              text-align: center;
            }
            #foto{
              text-align:center;
            }
          </style>
    </head>
    <body>
        <div id="contenedor">
          <h1>Saludo</h1>
          <form action="index.php" method="get">
            <label for="hora">¿Que hora es?:</label>
            <input type="number" id="hora" name="hora" min="0" step="1" autofocus><br>
            <input type="submit" value="Aceptar">
          </form>
        </div>
        <?php
          if(isset($_GET['hora'])){
            $horaIntroducida = $_GET['hora'];
            if(($horaIntroducida >= 6)&&($horaIntroducida <= 12)){
              echo "<p id=\"saludo\">Buenos dias</p>";
              echo "<div id=\"foto\"><img src=\"Buenosdias.jpg\" alt=\"amanecer\" width=\"400\" height=\"300\" title=\"Amanecer\"></div>";
            }
            if(($horaIntroducida >= 13)&&($horaIntroducida <= 20)){
              echo "<p id=\"saludo\">Buenas tardes</p>";
              echo "<div id=\"foto\"><img src=\"Buenastardes.jpg\" alt=\"amanecer\" width=\"400\" height=\"300\" title=\"Amanecer\"></div>";
            }
            if((($horaIntroducida >= 21 )&&($horaIntroducida <= 24)) || (($horaIntroducida >= 1 )&&($horaIntroducida <= 5))){
              echo "<p id=\"saludo\">Buenas noches</p>";
              echo "<div id=\"foto\"><img src=\"Buenasnoches.jpg\" alt=\"amanecer\" width=\"400\" height=\"300\" title=\"Amanecer\"></div>";
            }
          }
        ?>
    </body>
</html>
