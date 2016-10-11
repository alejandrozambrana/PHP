<!DOCTYPE html>
<!--
Ejercicio 6
Realiza un programa que pida 8 números enteros y que luego muestre esos números de colores, los
pares de un color y los impares de otro.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      img{
        box-shadow: 3px 6px 12px 0px;
      }
      
    </style>
    
  </head>
  <body>
    <?php
      $n = $_GET['n'];
      $contadorNumeros = $_GET['contadorNumeros'];
      $numeroTexto = $_GET['numeroTexto'];
      
    //inicializa estas variables si no pasa nada por &n
    if(!isset($n)){
      $contadorNumeros = 0;
      $numeroTexto = "";
    } 
    
    if($contadorNumeros == 8){
      $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído
      $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros espacios de la cadena
      $numero = explode(" ", $numeroTexto); //combierte la cadena de caracteres en un array de numero separando los numeros por espacios
      
      foreach ($numero as $num){
        if($num % 2 == 0){
          echo "<span style=\"color: red;\">$num </span>";
        } else {
          echo "<span style=\"color: green;\">$num </span>";
        }
        
      }
    }
    
    if(($contadorNumeros < 8) || (!isset($n))){
    ?>
      <!-- pide los datos-->
      <h1>Introduce 8 numero</h1>
      <form action="paresyImpares.php" method="GET">
        <input type="number" name="n" id="numeroId" step="1" autofocus></br>
        <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
        <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $n ?>">
        <input type="submit" value="Continuar">
      </form>
    <?php
    }
    ?>
  </body>
</html>
