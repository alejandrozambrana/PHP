<!DOCTYPE html>
<!--
Ejercicio 5
Escribe un programa que calcule el área de un rectángulo.
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
      <h2>Calcula la area de un rectangulo</h2>
      <form action="resultado.php" method="get">
        <label for="altura">Altura del rectangulo</label>
        <input type="number" id="altura" name="altura" min="0" autofocus="autofocus"><br>
        <label for="anchura">Anchura del rectangulo</label>
        <input type="number" id="anchura" name="anchura" min="0" ><br>
        <input type="submit" value="Calcular">
      </form>
    </div>
  </body>
</html>
