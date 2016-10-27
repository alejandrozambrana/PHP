<?php 
//error_reporting(E_ALL ^ E_NOTICE); //no muestra error de variables indefinida
session_start();

if(!isset($_GET['numero'])){
  $_SESSION['numerosIntroducidos'] = array();
  $_SESSION['contador'] = 0;
  $_SESSION['suma'] = 0;
  $_SESSION['media'] = 0;
  $_SESSION['maximo'] = -PHP_INT_MAX;
  $_SESSION['min'] = PHP_INT_MAX;
  $_SESSION['numeroPrimos'] = 0;
}

?>
<!DOCTYPE html>
<!--
1. Escribe un programa que pida números positivos uno detrás de otro. Se termina introduciendo un
número negativo. A continuación, el programa debe mostrar la media, el máximo, el mínimo y el
número de primos encontrados. Utiliza sesiones para propagar los datos necesarios; no se permite
utilizar campos ocultos en formularios.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        background-color: lightblue;
      }
      table, td {
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
      if($_GET['numero'] > 0){
        
        //mete los numeros en un array
        $_SESSION['numerosIntroducidos'][$_SESSION['contador']] = $_GET['numero'];
        
        //coje el maximo
        if($_SESSION['maximo'] < $_GET['numero']){
          $_SESSION['maximo'] = $_GET['numero'];
        }
        
        //coje el minimo
        if($_SESSION['min'] > $_GET['numero']){
          $_SESSION['min'] = $_GET['numero'];
        }
        $_SESSION['contador']++;
        
        $_SESSION['suma'] = $_SESSION['suma'] + $_GET['numero'];
        
        $_SESSION['media'] = $_SESSION['suma'] / $_SESSION['contador'];
        
      }
      
    if($_GET['numero'] >= 0 || !isset($_GET['numero'])){
    ?>
      <h1>Introduce un numero</h1>
      <form action="mediaMaxMinNumPrimoSessiones.php" method="GET">
        <input type="number" name="numero" id="numeroId" required="" step="1" autofocus>
        <input type="submit" value="Continuar">
      </form>
    <?php
    } else {
      
       //cuenta los primos
        for ($i = 0; $i < count($_SESSION['numerosIntroducidos']); $i++) {
          $esPrimo = true;
          for ($x = 2; $x < $_SESSION['numerosIntroducidos'][$i]; $x++) {
            if(($_SESSION['numerosIntroducidos'][$i] % $x) == 0){
              $esPrimo = false;
            } 
          }
          if ($esPrimo) {
            $_SESSION['numeroPrimos']++;
          } 
        }
      
      echo "<h1>Numeros introducidos</h1><table><tr>";
      foreach ($_SESSION['numerosIntroducidos'] as $num){
        echo "<td>",$num, " </td>";
      }
      echo "</table></tr>";
      echo "</br> Media: ", $_SESSION['media'], "</br>";
      echo "Maximo: ", $_SESSION['maximo'], "</br>";
      echo "Minimo: ", $_SESSION['min'], "</br>";
      echo "Nº Primos: ", $_SESSION['numeroPrimos'];
      session_destroy();
    }
    ?>
  </body>
</html>
