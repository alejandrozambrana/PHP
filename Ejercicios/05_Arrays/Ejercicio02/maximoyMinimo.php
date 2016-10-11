<!DOCTYPE html>
<!--
Ejercicio 2
Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos
junto con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      div{
        display: inline-block;
      }
    </style>
    
  </head>
  <body>
    <?php
      $n = $_GET['n'];
      $contadorNumeros = $_GET['contadorNumeros'];
      $numeroTexto = $_GET['numeroTexto'];
      
      if(!isset($n)){
        $contadorNumeros = 0;
        $numeroTexto = "";
      }
      
      // Muestra los números introducidos
      if ($contadorNumeros == 10) {
        $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído
        $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros espacios de la cadena
        $numero = explode(" ", $numeroTexto);
        
        $maximo = -PHP_INT_MAX;
        $minimo = PHP_INT_MAX;
        
        foreach ($numero as $num) {
          if($maximo < $num){
            $maximo = $num;
          }
          if($minimo > $num){
            $minimo = $num;
          }
        }
        
        echo "Los números introducidos son: ";
        foreach ($numero as $num) {
          echo $num, ", ";
        }
        echo "</br>";
        echo "Maximo introducido: ", $maximo, "</br>";
        echo "Minimo introducido: ", $minimo, "</br>";
        
      }
        
      
      // Pide número y añade el actual a la cadena
      if (($contadorNumeros < 10) || (!isset($n))) {
    ?>
        <h1>Introduce un numero</h1>
        <form action="maximoyMinimo.php" method="GET">
          <input type="number" name="n" id="numeroId" min="1"  step="1" autofocus>
          <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
          <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $n ?>">
          <input type="submit" value="Continuar">
        </form>
    <?php
      }
    ?>
  </body>
</html>
