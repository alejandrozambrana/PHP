<!DOCTYPE html>
<!--
Ejercicio 9
Realiza un conversor de pesetas a euros. La cantidad en pesetas que se quiere 
convertir deberá estar almacenada en una variable.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conversor</title>
        <style>
            p{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
        $euro= 166.38;
        $pesetas= 600/ $euro;
        echo "<p>600 peseta es ", round($pesetas,2), "€ </p>";
        ?>
    </body>
</html>
