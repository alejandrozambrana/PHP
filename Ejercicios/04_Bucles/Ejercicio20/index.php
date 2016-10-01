<!DOCTYPE html>
<!--
Ejercicio 20
Igual que el ejercicio anterior pero esta vez se debe pintar una pirámide hueca.
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
        margin:auto; 
        padding-left: 3%;
        
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
          $espaciosDelanteros = $alturaIntroducida - 1;
          $espaciosInternos = 0;
          
          //pinta la piramide
          while($altura < $alturaIntroducida){
            
            //espacios en blanco por delante
            for($i = 1 ; $i <= $espaciosDelanteros; $i++){
              echo "<img src=\"blanco.png\" width=\"36\">";
            }

            //pinta los dibujos
            echo "<img src=\"$figura.png\" width=\"36\">";
            //espacios internos
            for($i = 1 ; $i < $espaciosInternos; $i++){
              echo "<img src=\"blanco.png\" width=\"36\">";
            }
            
            if($altura > 1){
              echo "<img src=\"$figura.png\" width=\"36\">";
            }
            echo "<br>";
            
            $altura++;
            $espaciosDelanteros--;
            $espaciosInternos +=2;
          }//while
          //base de la piramide
          for($i = 1 ; $i < $altura * 2; $i++){
              echo "<img src=\"$figura.png\" width=\"36\">";
          }
          
          echo "<br><br>";
          echo "<a href=\"index.php\">>> Volver</a>";
        }
      ?>
      
    </div>
  </body>
</html>
