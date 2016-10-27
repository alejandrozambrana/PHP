<!DOCTYPE html>
<!--
1. Escribe un programa que pida 6 números uno detrás de otro (no se pueden pedir los 6 en la misma página) y
que, a continuación, muestre el máximo, el mínimo y el número de primos (solo la cantidad).
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        background-color: lightblue;
      }
    </style>
  </head>
  <body>
    <?php
    $numeroIntroducido = $_GET['numero'];
    $contadorNumero = $_GET['contadorNumero'];
    $numeroTexto = $_GET['numeroTexto'];
      
    if(!isset($numeroIntroducido)){
      $contadorNumero = 0;
      $numeroTexto = "";
      
    } 
    
    if($contadorNumero == 6){
      $numeroTexto = $numeroTexto . " " . $numeroIntroducido; // añade el último número leído
      $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros espacios de la cadena
      $numero = explode(" ", $numeroTexto);
      
      $maximo = -PHP_INT_MAX;
      $minimo = PHP_INT_MAX;
      $numeroPrimos = 0;
      
      foreach ($numero as $num){
        if($num < $minimo){
          $minimo = $num;
        }
        if($num > $maximo){
          $maximo = $num;
        }
        
      }
      for ($i = 0; $i < 6; $i++) {
        $esPrimo = true;
        for ($x = 2; $x < $numero[$i]; $x++) {
          if(($numero[$i] % $x) == 0){
            $esPrimo = false;
          } 
        }
        if ($esPrimo) {
            $numeroPrimos++;
          } 
      }
      
        echo "Los números introducidos son: ";
        foreach ($numero as $num) {
          echo $num, ", ";
        }
        echo "</br>";
        echo "Maximo introducido: ", $maximo, "</br>";
        echo "Minimo introducido: ", $minimo, "</br>";
        echo "Numero Primos: ", $numeroPrimos, "</br>";
    }
    
    if($contadorNumero < 6){
    ?>
    
    <h1>Introduce un numero</h1>
    <form action="numeroMaxMinPrimos.php" method="GET">
      <input type="number" name="numero" id="numeroId" min="1"  step="1" autofocus>
      <input type="hidden" name="contadorNumero" value="<?= ++$contadorNumero?>">
      <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $numeroIntroducido?>">
      <input type="submit" value="Continuar">
    </form>
    <?php
    }
    ?>
  </body>
</html>
