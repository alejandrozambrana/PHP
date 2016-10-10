<!DOCTYPE html>
<!--
Ejercicio 10
Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos
suman según el juego de la brisca. Emplea un array asociativo para obtener los puntos a partir del
nombre de la figura de la carta. Asegúrate de que no se repite ninguna carta, igual que si las hubieras
cogido de una baraja de verdad.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>    
  </head>
  <body>
    <?php
      $puntos = array (
        'as' => 11, 
        'dos' => 0, 
        'tres' => 10, 
        'cuatro' => 0, 
        'cinco' => 0,
        'seis' => 0, 
        'siete' => 0, 
        'sota' => 2, 
        'caballo' => 3, 
        'rey' => 4);

      $palo = array ('oros', 'copas', 'bastos', 'espadas');

      $numero = array ('as', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'sota', 'caballo', 'rey');
      
      $arrayCartas = [];
      $puntuacion = 0;
      $contador = 0;
      //este ejercicio tmb se puede hacer con un if y la funcion in_array que comprueba si esa carta esta en el array  ej:  if (!in_array($carta, $arrayCartas)) {
      do{
        $paloSacado = $palo[rand(0, 3)]; // saca del array palo un palo
        $numeroSacado = $numero[rand(0, 9)]; //saca del array numero un numero de carta
        $puntosSacados = $puntos[$numeroSacado]; //mediante el numero sacado saca los puntos de ese numero 
        $carta = "$numeroSacado de $paloSacado"; //mete en esta variable la carta en string
        $arrayCartas[$contador] = $carta; //mete la carta en el array
        $contador = count(array_unique($arrayCartas)); // cuenta cuantas cartas hay que no se repiten
        $arrayCartas = array_unique($arrayCartas); //Elimina las cartas repetidas del array
        $puntuacion = $puntuacion + $puntosSacados; //suma la puntuacion de cada carta
      }while($contador < 10); // hace el bucle mientras contador de las cartas que no estan repetidas sea igual a 10
      
      foreach ($arrayCartas as $carta) {
        echo $carta, " </br>";
      }
      
      echo "Hemos sacado ", $puntuacion, " puntos";
    ?>
  </body>
</html>
