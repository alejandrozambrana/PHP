<!DOCTYPE html>
<!--
2. Realiza un programa que pida 10 números por teclado y que los almacene en un array. A continuación se debe
mostrar el contenido de ese array junto al índice (0 – 9). Seguidamente el programa debe colocar de forma alterna y
en orden los pares y los impares: primero par, luego impar, luego par, luego impar… Cuando se acaben los pares o
los impares, se completará con los números que queden.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        background-color: lightblue;
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
    $numeroIntroducido = $_GET['numero'];
    $contadorNumero = $_GET['contadorNumero'];
    $numeroTexto = $_GET['numeroTexto'];
      
    if(!isset($numeroIntroducido)){
      $contadorNumero = 0;
      $numeroTexto = "";
      
    } 
    
    if($contadorNumero == 10){
      $numeroTexto = $numeroTexto . " " . $numeroIntroducido; // añade el último número leído
      $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros espacios de la cadena
      $numero = explode(" ", $numeroTexto); //coje los numeros de la variable numeroTexto que estan separados por espacios y lo mete en un array llamado numero
      $numeroModificado = [];  
      
      echo 'Array Original';
      /////////array Original/////////////
      echo '<table>';
      echo '<tr>';
      //indice array
      for($i = 0; $i <= 9; $i++){
        echo "<td>", $i, "</td>";
      }
      echo '</tr>';
      echo '<tr>';
      //muestra array
      foreach ($numero as $num){
        echo "<td>", $num, "</td>";
      }
      echo '</tr>';
      echo '</table></br>';
      
      //mete los numeros en array de pares y en un array de impares
      $contadorPar = 0;
      $contadorImpar = 0;
      for($i = 0; $i < 10; $i++){
        if($numero[$i] % 2 == 0){
          $par[$contadorPar] = $numero[$i];
          $contadorPar++;
        } else {
          $impar[$contadorImpar] = $numero[$i];
          $contadorImpar++;
        }
      }
      
      //mete los numeros en el array resultado
      $contador = 0;
      $contador1 = 0;
      $contador2 = 0;
      $contador3 = 1;
      for($i = 0; $i < count($numero); $i++){
        if(count($par) > $contador1){  
          $numeroModificado[$contador] = $par[$contador1];
          $contador1++;
          $contador += 2;
        }
        if(count($impar) > $contador2){
          $numeroModificado[$contador3] = $impar[$contador2];
          $contador2++;
          $contador3 += 2;
        }
      }
      echo 'Array Resultado';      
      /////////array modificado////////////
      echo '<table>';
      echo '<tr>';
      //indice array
      for($i = 0; $i <= 9; $i++){
        echo "<td>", $i, "</td>";
      }
      echo '</tr>';
      echo '<tr>';
      //muestra array
      foreach ($numeroModificado as $num){
        echo "<td>", $num, "</td>";
      }
      echo '</tr>';
      echo '</table>';
    }
    if($contadorNumero < 10){
    ?>
      <h1>Introduce un numero</h1>
      <form action="ordenaArrayParesYImpares.php" method="GET">
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
