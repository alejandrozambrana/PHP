<!DOCTYPE html>
<!--
Ejercicio 12
Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio
anterior. El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras
y comprobará si son correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas
y cuántas erróneas.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>    
  </head>
  <body>
    <?php
      if(isset($_GET['palabra'])){
        
        $diccionario = array (
          'rojo' => 'red', 
          'puerta' => 'door', 
          'perro' => 'dog', 
          'ventana' => 'windows', 
          'verde' => 'green',
          'gato' => 'cat', 
          'lapiz' => 'pencil', 
          'futbol' => 'soccer', 
          'caballo' => 'horse', 
          'casa' => 'house', 
          'arbol' => 'tree', 
          'año' => 'year',
          'hombre' => 'men', 
          'mujer' => 'woman', 
          'lugar' => 'place', 
          'libro' => 'book', 
          'cara' => 'face', 
          'ciudad' => 'city', 
          'profesor' => 'teacher',
          'guerra' => 'war', );
      
        $palabra = $_GET['palabra'];
        
        
      }
      
      if(!isset($_GET['palabra'])){
    ?>
    <h1>Introduce una palabra en español</h1>
    <form action="index.php" method="GET">
      <input type="text" name="palabra" id="palabraId" autofocus required>
      <input type="submit" value="Continuar">
    </form>
    
    <?php
      }
    ?>
  </body>
</html>
