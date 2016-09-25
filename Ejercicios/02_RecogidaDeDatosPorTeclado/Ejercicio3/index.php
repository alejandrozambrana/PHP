<!DOCTYPE html>
<!--
Ejercicio 3
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
introducir por teclado.
-->
<html>
    <head>
      <meta charset="UTF-8">
      <title>conversor de pesetas a euros</title>
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
        <h2>Conversor de pesetas a euros</h2>
        <form action="resultado.php" method="get">
          <label for="pesetas">Introduce pesetas</label>
          <input type="number" id="pesetas" name="pesetas" min="0" autofocus="autofocus"><br>
          <input type="submit" value="Resultado">
        </form>
      </div>
    </body>
</html>
