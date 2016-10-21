<!DOCTYPE html>
<!--
Ejercicio 8
Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa
pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son
correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se
deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la
aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <style>
    
  </style>
  <body>
    <?php
    $diccionario = [
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
        'guerra' => 'war',
    ]
    ?>
    <h1>Guarda Color de Fondo en las Coookies</h1>
    <form action="GuardarEnCookieFondo.php" method="GET">
      <input type="color" name="color" id="colorId">
      <input type="submit" value="Cambiar Fondo">
    </form>
    <?php
    
      //mete en un array las palabras en español
      foreach ($diccionario as $clave => $valor) {
        $ingles[] = $valor;
      }
    
      $contadorPalabras = 0;
      do{
        $palabraExtraida = $ingles[$aleatorio = rand(0, 20)];
        if(!isset($palabraExtraida)){
          
        }
      }($contadorPalabras < 5);
    ?>
  </body>
</html>
