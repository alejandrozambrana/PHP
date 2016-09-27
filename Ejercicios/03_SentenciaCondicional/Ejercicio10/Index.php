<!DOCTYPE html>
<!--
Ejercicio 10
Escribe un programa que nos diga el horóscopo a partir del día y el mes de nacimiento.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Horoscopo</title>
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
          <h1>Horoscopo</h1>
          <form action="index.php" method="get">
            <label for="dia">Introduze el dia en el que naciste:</label>
            <input type="number" id="dia" name="dia" min="0" step="1" autofocus><br>
            <label for="mes">Introduze el mes en que naciste(Escrito):</label>
            <input type="text" id="mes" name="mes" ></br></br>
            <input type="submit" value="Aceptar">
          </form></br>
          <?php
            if(isset($_GET['mes'])){

              $mes = $_GET['mes'];
              $dia = $_GET['dia'];
              $horoscopo = "";
              
              switch ($mes){
                case "enero":
                  if ($dia < 20) {
                    $horoscopo = "Capricornio";
                  } else {
                    $horoscopo = "Acuario";
                  }
                  break;
                case "febrero":
                  if ($dia < 18) {
                    $horoscopo = "Acuario";
                  } else {
                    $horoscopo = "Piscis";
                  }
                  break;  
                case "marzo":
                  if ($dia < 20) {
                    $horoscopo = "Piscis";
                  } else {
                    $horoscopo = "Aries";
                  }
                  break; 
                case "abril":
                  if ($dia < 20) {
                    $horoscopo = "Aries";
                  } else {
                    $horoscopo = "Tauro";
                  }
                  break; 
                case "mayo":
                  if ($dia < 21) {
                    $horoscopo = "Tauro";
                  } else {
                    $horoscopo = "Geminis";
                  }
                  break; 
                case "junio":
                  if ($dia < 21) {
                    $horoscopo = "Geminis";
                  } else {
                    $horoscopo = "Cancer";
                  }
                  break; 
                case "julio":
                  if ($dia < 23) {
                    $horoscopo = "Cancer";
                  } else {
                    $horoscopo = "Leo";
                  }
                  break; 
                case "agosto":
                  if ($dia < 23) {
                    $horoscopo = "Leo";
                  } else {
                    $horoscopo = "Virgo";
                  }
                  break; 
                case "septiembre":
                  if ($dia < 23) {
                    $horoscopo = "Virgo";
                  } else {
                    $horoscopo = "Libra";
                  }
                  break; 
                case "octubre":
                  if ($dia < 23) {
                    $horoscopo = "Libra";
                  } else {
                    $horoscopo = "Escorpio";
                  }
                  break; 
                case "noviembre":
                  if ($dia < 22) {
                    $horoscopo = "Escorpio";
                  } else {
                    $horoscopo = "Sagitario";
                  }
                  break;
                case "diciembre":
                  if ($dia < 22) {
                    $horoscopo = "Sagitario";
                  } else {
                    $horoscopo = "Capricornio";
                  }
                  break; 
                  default:
                }
                echo "Tu horoscopo es: <b>$horoscopo</b>";
              }
          ?>
        </div>
    </body>
</html>
