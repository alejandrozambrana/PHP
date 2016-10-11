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
      
      if(!isset($_GET['palabrasAleatorias'])){
        $palabra = $_GET['palabra'];
        $español = [];
        $palabrasAleatorias = [];
        
        //mete en un array las palabras en español
        foreach ($diccionario as $clave => $valor) {
          $español[] = $clave;
        }
        
        //coje 5 palabras aleatoriamente
        $contadorPalabras = 0;
        do{
          $palabraExtraida = $español[rand(0, 19)];
          if(!+in_array($palabraExtraida, $palabrasAleatorias)){
            $palabrasAleatorias[] = $palabraExtraida;
            $contadorPalabras++;
          }
        }while($contadorPalabras < 5);
        
    ?>
    <h1>Introduce la tradiccion en ingles</h1>
    <form action="index.php" method="GET">
      <?php
      for($i = 0; $i < 5; $i++){
        echo $palabrasAleatorias[$i], " ";
        echo '<input type="hidden" name="palabrasAleatorias[',$i,']" value="',$palabrasAleatorias[$i],'">';
        echo '<input type="text" name="palabraIngles[',$i,']"><br>';
      }
      ?>
      <input type="submit" value="Continuar">
    </form>
    
    <?php
      } else {
        $palabrasAleatorias = $_GET['palabrasAleatorias'];
        $palabraIngles  = $_GET['palabraIngles'];
        
        for($i = 0; $i < 5; $i++){
          if($diccionario[$palabrasAleatorias[$i]] == $palabraIngles[$i]){
            echo "<b>". $palabrasAleatorias[$i]. ": ". $palabraIngles[$i]. "</b> correcto</br>";
          } else {
            echo "<b>", $palabrasAleatorias[$i], " : ", $palabraIngles[$i], "</b> Es incorrecto</br>";
          }
        }
      }
    ?>
  </body>
</html>
