<!DOCTYPE html>
<!--
Ejercicio 19
Realiza un programa que pinte una pirámide por pantalla. La altura se debe pedir por teclado
mediante un formulario. La pirámide estará hecha de bolitas, ladrillos o cualquier otra imagen
de las 5 que se deben dar a elegir mediante un formulario.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        background-color: #ffffcc;
      }
      #contenedor{
        width: 100%;
        margin: auto; 
        text-align: left;
      }
      
    </style>
  </head>
  <body>
    <div id="contenedor">
      <h1>Piramide</h1>
      <?php
        $alturaIntroducida = $_GET['alturaIntroducida'];
        $figura = $_GET['figura'];
        
        if(!isset($alturaIntroducida)){//mira que la variable $alturaIntroducida no este definida
      
      ?>
      
          <form action="index.php" method="GET">
            <label for="altura">Altura</label>
            <input type="number" name="alturaIntroducida" id="altura" step="1" autofocus>
            <select name="figura" placeholder="Selecciona el dibujo" >
              <option value="bolita">Bolitas</option>
              <option value="ladrillo">Ladrillos</option>
              <option value="pina">Piña</option>></br></br>
            </select><br><br>
            <input type="submit" value="Aceptar">
          </form> 
      <?php
        } else {
          $altura = 1;
          $espacios = $alturaIntroducida - 1;
          
          //pinta la piramide
          while($altura <= $alturaIntroducida){
            
            //espacios en blanco
            for($i = 1 ; $i <= $espacios; $i++){
              echo "<img src=\"blanco.png\" width=\"36\">";
            }

            //pinta los dibujos
            for($i = 1 ; $i < $altura * 2; $i++){
              echo "<img src=\"$figura.png\" width=\"36\">";
            }
            
            echo "<br>";
            
            $altura++;
            $espacios--;
          }
          echo "<br><br>";
          echo "<a href=\"index.php\">>> Volver</a>";
        }
      ?>
      
    </div>
  </body>
</html>
