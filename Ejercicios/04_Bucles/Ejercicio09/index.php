<!DOCTYPE html>
<!--
Ejercicio 9
Realiza un programa que nos diga cuántos dígitos tiene un número introducido por teclado.
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
      <h1>Introduce un numero</h1>
      <form action="resultado.php" method="GET">
        <input type="number" name="numero" id="numero" min="1"  step="1" autofocus>
        <input type="submit" value="Continuar">
      </form>
    </div>
  </body>
</html>
