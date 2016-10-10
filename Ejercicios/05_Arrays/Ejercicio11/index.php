<!DOCTYPE html>
<!--
Ejercicio 11
Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción).
Utiliza un array asociativo para almacenar las parejas de palabras. El programa pedirá una palabra
en español y dará la correspondiente traducción en inglés.
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
        
        foreach ($diccionario as $clave => $valor) {
          $palabrasEspanol[] = $clave;
        }
        
        if(!in_array($palabra, $palabrasEspanol)){
          echo $palabra, " no esta en el diccionario";
        } else {
          echo $palabra, " en ingles es: ", $diccionario[$palabra];
        }
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
