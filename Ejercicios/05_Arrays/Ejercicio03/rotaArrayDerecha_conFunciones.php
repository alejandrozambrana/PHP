<!DOCTYPE html>
<!--
Ejercicio 3
Escribe un programa que lea 15 números por teclado y que los almacene en un array. Rota los
elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a
la 2, etc. El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente,
muestra el contenido del array.
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
        
        
        $arrayMovido = array_shift($ultimo);
	array_push($ultimo,$arrayMovido);
        
        for($i = 14;$i > 0 ; $i--){
          $arrayMovido = array_shift($ultimo);//saca el ultimo numero del array
          array_push($ultimo,$arrayMovido);//mete el ultimo numero en la primera posicion
        }
        
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
        <form action="rotaArrayDerecha.php" method="GET">
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
