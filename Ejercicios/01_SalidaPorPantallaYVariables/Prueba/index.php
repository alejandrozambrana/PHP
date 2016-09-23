<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $a = 8; 
        $b = 3;
        echo $a + $b;"<br>";
        echo $a - $b;"<br>";
        echo $a * $b;"<br>";
        echo $a / $b;"<br>";
        $a++; echo $a, "<br>";
        $b--; echo $b, "<br>";
        print_r(get_defined_vars());
        ?>
    </body>
</html>
