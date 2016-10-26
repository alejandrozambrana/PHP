<!DOCTYPE html>
<!--
En ajedrez, el valor de las piezas se mide en peones según la siguiente tabla:
Pieza Dama Torre Alfil Caballo Peón
Valor 9 peones 5 peones 3 peones 2 peones 1 peón
Realiza un programa que vaya generando al azar las piezas que capturan dos jugadores durante una partida. Un
jugador se rinde cuando el contrario captura el equivalente a 9 peones (o más).
Ejemplo:
Fichas capturadas:
Alfil negro (3 peones)
Caballo blanco (2 peones)
Peón blanco (1 peones)
Torre negro (5 peones)
Alfil negro (3 peones)
Las negras se rinden, han perdido el equivalente a 11 peones.
Hay que tener en cuenta que cada jugador tiene la posibilidad de capturar algunas de las siguientes piezas (no
más): 1 dama, 2 torres, 2 alfiles, 2 caballos y 8 peones.
El valor de cada pieza se debe almacenar en un array asociativo.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    $valor = [
        'Dama' => 9,
        'Torre' => 5,
        'Alfil' => 3,
        'Caballo' => 2,
        'Peon' => 1
    ];
    
    $color = ['blanco', 'negro'];
    
    $piezas = [ 'Dama', 'Torre', 'Alfil', 'Caballo', 'Peon'];
    
    $figuras = [];
    $contador = 0;
    $sumaBlanco = 0;
    $sumaNegros = 0;
    $final = 0;
    do{
      $piezaSacada = $piezas[rand(0, 4)]; //saca una pieza al azar
      $colorSacado = $color[rand(0, 1)]; //saca un color al azar
      $valorSacado = $valor[$piezaSacada]; //saca el valor de la pieza sacada
      
      //comprueba que el color y suma los valores obtenidos por esas piezas
      if($colorSacado == "blanco"){
        $sumaBlanco += $valorSacado;
      } else {
        $sumaNegros += $valorSacado;
      }
      //si es peon escribre peon y si no es un peon pone peones y escribre las tiradas
      if($piezaSacada == 'Peon'){
        $tirada = "$piezaSacada $colorSacado ($valorSacado peon)";
      } else {
        $tirada = "$piezaSacada $colorSacado ($valorSacado peones)";
      }
 
      //mete los tiradas en un array
      $figuras[$contador] = $tirada;
      $contador++;  
      
      //comprueba que gana el blanco o gana el negro
      if($sumaBlanco < 9 && ($sumaNegros == 9 || $sumaNegros > 9)){
        $final++;
        $mensaje = "Las negras se rinden, han perdido el equivalente a $sumaNegros peones.";
      }
      if($sumaNegros < 9  && ($sumaBlanco == 9 || $sumaBlanco > 9)){
        $final++;
        $mensaje = "Las blancas se rinden, han perdido el equivalente a $sumaBlanco peones.";
      }
    } while ($final < 1);
    
    //muestra las tiradas
    foreach ($figuras as $resultado){
      echo $resultado, "</br>";
    }
    
    //muestra quien es el perdedor
    echo $mensaje;
    
    ?>
  </body>
</html>
