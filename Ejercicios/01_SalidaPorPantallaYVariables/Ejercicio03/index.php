<!DOCTYPE html>
<!--
Ejercicio 3
Escribe un programa que muestre por pantalla 10 palabras en inglés junto a su 
correspondiente traducción al castellano. Las palabras deben estar distribuidas 
en dos columnas. Utiliza la etiqueta <table> de HTML.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Traductor</title>
        <style>
            table, tr, td, th{
                border: 1px solid black;
                border-collapse: collapse;
            }
            table{
                margin:auto;
            }
        </style>
    </head>
    <body>
        <?php
        echo"<table>";
        echo    "<tr>";
        echo        "<th>Castellano</th>";
        echo        "<th>Ingles</th>";
        echo    "</tr>";
        echo    "<tr>";
        echo        "<td>Hola</td>";
        echo        "<td>Hello</td>";
        echo    "</tr>";
        echo    "<tr>";
        echo        "<td>Adios</td>";
        echo        "<td>bye</td>";
        echo    "</tr>";
        echo        "<td>Rojo</td>";
        echo        "<td>red</td>";
        echo    "</tr>";
        echo        "<td>perro</td>";
        echo        "<td>dog</td>";
        echo    "</tr>";
        echo        "<td>foto</td>";
        echo        "<td>Picture</td>";
        echo    "</tr>";
        echo        "<td>conejo</td>";
        echo        "<td>rabbit</td>";
        echo    "</tr>";
        echo        "<td>raton</td>";
        echo        "<td>mouse</td>";
        echo    "</tr>";
        echo        "<td>gato</td>";
        echo        "<td>cat</td>";
        echo    "</tr>";
        echo        "<td>lapiz</td>";
        echo        "<td>pencil</td>";
        echo    "</tr>";
        echo        "<td>cartera</td>";
        echo        "<td>wallet</td>";
        echo    "</tr>";
        echo"</table>";
        ?>
    </body>
</html>
