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
