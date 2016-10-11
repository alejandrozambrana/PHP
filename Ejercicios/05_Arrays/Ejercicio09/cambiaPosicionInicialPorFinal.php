<!DOCTYPE html>
<!--
Ejercicio 9
Realiza un programa que pida 10 números por teclado y que los almacene en un array. A
continuación se mostrará el contenido de ese array junto al índice (0 – 9). Seguidamente el programa
pedirá dos posiciones a las que llamaremos “inicial” y “final”. Se debe comprobar que inicial es
menor que final y que ambos números están entre 0 y 9. El programa deberá colocar el número de
la posición inicial en la posición final, rotando el resto de números para que no se pierda ninguno.
Al final se debe mostrar el array resultante.
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
    ?> 
        <form action="cambiaPosicionInicialPorFinal.php" method="GET">
          Posicion Inicial: <input type="number" name="inicial" id="inicialId" min="0" max="9"  step="1" autofocus required>
          Posicion Final: <input type="number" name="final" id="finalId" min="0" max="9" step="1" required >
          <input type="hidden" name="contadorNumeros" value="12">
          <input type="hidden" name="numeroTexto" value="<?php echo $numeroTexto; ?>">
          <input type="hidden" name="n" value="definido">
          <input type="submit" value="Continuar">
        </form>
    <?php
      } 
      
      if($contadorNumeros == 12){
        
        $inical = $_GET['inicial'];
        $final = $_GET['final'];
        
        if(($inicial < $final) && ($inical < 10) && ($inicial >= 0) && ($final < 10) && ($final >= 0)){ //comprueba que cumpla esas condiciones
          
          $numero = explode(" ", $numeroTexto);//pasa de cadena de caracteres a entero
         
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
          
          
          $numPosicionFinal = $numero[9];//guarda la ultima posicion del array en esta variable
          
          //mueve una posicion a la derecha los numeros hasta la posicion final
          for($i = 9; $i > $final; $i--){
            $numero[$i] = $numero[$i - 1];
          }
          $numero[$final] = $numero[$inical];//mete en la posicion final el numero de la posicion inicial
          
          //mueve el resto de numeros
          for($i = $inical; $i > 0; $i--){
            $numero[$i] = $numero[$i-1];
          }

          $numero[0] = $numPosicionFinal;//mete en la primera posicion el que estaba en la ultima
          //pinta array Movido
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
          
        }
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
