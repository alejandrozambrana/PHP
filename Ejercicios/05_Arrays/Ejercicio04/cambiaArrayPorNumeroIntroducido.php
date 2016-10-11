<!DOCTYPE html>
<!--
Ejercicio 4
Escribe un programa que genere 100 números aleatorios del 0 al 20 y que los muestre por pantalla
separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación
cambiará todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente.
Los números que se han cambiado deben aparecer resaltados de un color diferente.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      div{
        display: inline-block;
      }
      table, td{
        border: 1px solid black;
        border-collapse: collapse;
      }
      td{
        padding: 10px;
      }
    </style>
    
  </head>
  <body>
    <?php
      $n = $_GET['n'];
      $numeroNuevo = $_GET['numeroNuevo'];
      $numeroTexto = $_GET['numeroTexto'];
      $arrayAleatorio = [];
      
      //si numerotexto no envia nada
      if(!isset($_GET['numeroTexto'])){
        //crea array aleatorio
        for($i = 0; $i < 100; $i++){
          $arrayAleatorio[$i] = rand(0, 20);
        }
        
        //comvierte el array en cadena de caracteres
        $numeroTexto = implode(" ", $arrayAleatorio);
      
        
      } else {
        //convierte el array de cadena de caracteres a entero
        $arrayAleatorio = explode(" ", $numeroTexto);
        
        //mete el numero nuevo en la posicion del antiguo
        for($i = 0; $i < 100; $i++){
          if($arrayAleatorio[$i] == $n){
            $arrayAleatorio[$i] = "<span style=\"color: red; font-weight: bold;\">$numeroNuevo</span> ";
          }
        }
      }
      
      //muestra el array 
      echo "Array Original: ";
      echo "<table>";
      foreach ($arrayAleatorio as $num) {
        echo "<td>" ,$num, "</td> ";
      }
      echo "</table> </br>";
      
    ?>
    <h1>Introduce un numero</h1>
    <form action="index.php" method="GET">
      Introduce que numero quieres cambiar:
      <input type="number" name="n" id="numeroId" step="1" autofocus></br>
      ¿Que numero quieres poner en su lugar?
      <input type="number" name="numeroNuevo" id="numeroNuevoId" step="1"></br>
      <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
      <input type="submit" value="Continuar">
    </form>
  </body>
</html>
