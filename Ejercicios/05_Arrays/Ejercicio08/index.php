<!DOCTYPE html>
<!--
Ejercicio 8
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una
tabla. Seguidamente el programa pasará los primos a las primeras posiciones, desplazando el resto
de números (los que no son primos) de tal forma que no se pierda ninguno. Al final se debe mostrar
el array resultante.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
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
      $contadorNumeros = $_GET['contadorNumeros'];
      $numeroTexto = $_GET['numeroTexto'];
      $arrayPrimos = [];
      $arrayNoPrimos = [];
      $contadorPrimos = 0;
      $contadorNoPrimos = 0;
      
      if(!isset($n)){
        $contadorNumeros = 0;
        $numeroTexto = "";
      }
      
      // Muestra los números introducidos
      if ($contadorNumeros == 10) {
        $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído
        $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros espacios de la cadena
        $numero = explode(" ", $numeroTexto); //combierte la cadena de caracteres en un array de numero separando los numeros por espacios
        
                
        //pinta array Original
        echo "Array Original: ";
        echo "<table><tr>";
        //indice
        for($i = 0; $i < 10; $i++){ 
          echo "<td>" ,$i, "</td> ";
        }
        echo "</tr><tr>";
        //muestra el array 
        foreach ($numero as $num) {
          echo "<td>" ,$num, "</td> ";
        }
        echo "</tr></table></br>";
        
        //mete los primos en un array y los no primos en otro
        for ($i = 0; $i < 10; $i++) {
          $esPrimo = true;
        
          for ($x = 2; $x < $numero[$i]; $x++) {
            if(($numero[$i] % $x) == 0){
              $esPrimo = false;
            } 
          }
          if ($esPrimo) {
            $arrayPrimos[$contadorPrimos] = $numero[$i];
            $contadorPrimos++;
          } else {
            $arrayNoPrimos[$contadorNoPrimos] = $numero[$i];
            $contadorNoPrimos++;
          }
        }    

        //mete en las primera posiciones los primos
        for($i = 0;$i < $contadorPrimos; $i++){
          $numero[$i] = $arrayPrimos[$i];
        }
        
        //mete en las ultimas posiciones los no primos
        for($i = $contadorPrimos; $i < $contadorPrimos + $contadorNoPrimos; $i++){
          $numero[$i] = $arrayNoPrimos[$i - $contadorPrimos];
        }
      
        //pinta array con los primos alante y los no primos atras
        echo "Array modificado: ";
        echo "<table><tr>";
        //indice
        for($i = 0; $i < 10; $i++){ 
          echo "<td>" ,$i, "</td> ";
        }
        echo "</tr><tr>";
        //muestra el array 
        for ($i = 0; $i < 10; $i++) {
          echo "<td>" ,$numero[$i], "</td> ";
        }
        echo "</tr></table></br>";
        
      }
       
      // Pide número y añade el actual a la cadena
      if (($contadorNumeros < 10) || (!isset($n))) {
    ?>
        <h1>Introduce 10 numero</h1>
        <form action="index.php" method="GET">
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
