<!DOCTYPE html>
<!--
Ejercicio 9
Escribe un programa que calcule el volumen de un cono mediante la fórmula V = 1
3r2h.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Area de rectangulo</title>
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
      <h2>Volumen de un cono</h2>
      <form action="resultado.php" method="get">
        <label for="radio">Radio (en cm)</label>
        <input type="number" id="radio" name="radio" min="0" autofocus><br>
        <label for="altura">Altura (en cm)</label>
        <input type="number" id="altura" name="altura" min="0"><br>
        <input type="submit" value="Calcular">
      </form>
    </div>
  </body>
</html>
