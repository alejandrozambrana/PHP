<!DOCTYPE html>
<!--
Ejercicio 3
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere convertir se deberá
introducir por teclado.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <?php
        $a = $_GET['pesetas'];
        $euro= 166.38;
        $pesetas= $a/ $euro;
        echo "<p>$a peseta es ", round($pesetas,2), "€ </p>";
      ?>
    </body>
</html>
