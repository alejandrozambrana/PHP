<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
    <?php
      $numero = $_GET['numero'];
      $numeroDigitos = 0;
      $numeroIntroducido = $numero;
      do{
        $numero = floor($numero/10);
        $numeroDigitos++;
      }while($numero != 0);
      
      echo "<h2>El ",  $numeroIntroducido, " tiene ", $numeroDigitos, " digitos.</h2>";
    ?>
      </br></br>
      <a href="index.php">Volver</a>
    </div>
  </body>
</html>
