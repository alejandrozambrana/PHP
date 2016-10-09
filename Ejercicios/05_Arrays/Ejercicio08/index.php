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
      $contadorNumeros = $_GET['contadorNumeros'];
      $numeroTexto = $_GET['numeroTexto'];
      
      if(!isset($n)){
        $contadorNumeros = 0;
        $numeroTexto = "";
      }
      
      // Muestra los números introducidos
      if ($contadorNumeros == 15) {
        $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído
        $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros espacios de la cadena
        $numero = explode(" ", $numeroTexto); //combierte la cadena de caracteres en un array de numero separando los numeros por espacios
        $arrayMovido = explode(" ", $numeroTexto);
        
                
        //muestra el array original
        echo "Array Original: ";
        echo "<table>";
        foreach ($numero as $num) {
          echo "<td>" ,$num, "</td> ";
        }
        echo "</table> </br>";
        
        //mete la ultimaposicion del array en una variable
        $ultimoDigito = $arrayMovido[14];
        
        //mueve todos los numeros del array hacia la derecha.
        for($i = 14;$i > 0 ; $i--){
          $arrayMovido[$i] = $numero[$i - 1];
        }
        //pone la ultima poscion del array como primera
        $arrayMovido[0] = $ultimoDigito;
        
        //muestra el array movido
        echo "Array Movido: ";
        echo "<table>";
        foreach ($arrayMovido as $num) {
          echo "<td>", $num, "</td> ";
        }
        echo "</table>";
      }
        
      
      // Pide número y añade el actual a la cadena
      if (($contadorNumeros < 15) || (!isset($n))) {
    ?>
        <h1>Introduce un numero</h1>
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
