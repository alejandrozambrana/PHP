<?php
session_start();// Inicia la sesión
//actualiza lel dicionario con las cookies
if(isset($_SESSION['diccionario'])){
  foreach ($_SESSION['diccionario'] as $espanol => $ingles) {
    setcookie($espanol, $ingles, time() + 365 * 24 * 3600);
  }
}

//carga las cookies en el diccionario.
foreach ($_COOKIE as $espanol => $ingles) {
  if (($espanol != "PHPSESSID")) { //evita que se cargue identificador de session
    $_SESSION['diccionario'][$espanol] = $ingles;
  }
}
?>
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
    if(!isset($_SESSION['diccionario'])){
      $_SESSION['diccionario'] = [
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
      ];
    }
 
    $diccionario = $_SESSION['diccionario'];
    
      if(!isset($_GET['arraycincoPalabras'])){
        $arraycincoPalabras = [];
        $ingles = [];
      
        //mete en un array las palabras en español
        foreach ($diccionario as $clave => $valor) {
          $palabrasEspañolas[] = $clave;
          
        }

        $contadorPalabras = 0;
        do{
          $palabraExtraida = $palabrasEspañolas[rand(0, count($palabrasEspañolas)-1)];
          if(!in_array($palabraExtraida, $arraycincoPalabras)){
            $arraycincoPalabras[] = $palabraExtraida;
            $contadorPalabras++;
          }
        }while($contadorPalabras < 5);
      
    ?>
        <h1>Introduce la traduccion en ingles</h1>
        <table>
          <form action="diccionarioCookie.php" method="GET">
            <?php
            for($i = 0; $i < 5 ;$i++){
              echo "<tr><td>",$arraycincoPalabras[$i], " </td> ";
              echo '<td><input type="hidden" name="arraycincoPalabras[',$i,']" value="',$arraycincoPalabras[$i],'"></td>';
              echo '<td><input type="text" name="palabraIntroducida[',$i,']" id="palabraId"></td></tr>';
            }
            ?>
            <tr><td><input type="submit" value="Continuar"></td></tr>
          </form>
        </table>
        
        <!--da de alta una palabra-->
        <form action="anadirPalabraDiccionario.php" method="GET">
          <input type="submit" value="Añadir palabra nueva">
        </form>
        
    <?php
      } else {
        $palabraintroducidas = $_GET['palabraIntroducida'];
        $palabraExtraida = $_GET['arraycincoPalabras'];
        $correctas = 0;
        $incorrectas = 0;
        
        for($i = 0; $i < 5 ;$i++){
          if($diccionario[$palabraExtraida[$i]] == $palabraintroducidas[$i]){
            echo $palabraExtraida[$i], " - ", $palabraintroducidas[$i], " <b>Correcta</b></br>";
            $correctas++;
          }else{
            echo $palabraExtraida[$i], " - ", $palabraintroducidas[$i], " <b>Incorrecta</b> la respuesta correcta es: <b>", $diccionario[$palabraExtraida[$i]], "</b></br>";
            $incorrectas++;
          }
        }
        
        echo "</br></br>Respuestas correctas: ", $correctas,  "</br>";
        echo "Respuestas incorrectas: ", $incorrectas,  "</br>" ;
      }
    ?>
  </body>
</html>
