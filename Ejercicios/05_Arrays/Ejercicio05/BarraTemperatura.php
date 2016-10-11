<!DOCTYPE html>
<!--
Ejercicio 5
Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado
año y que muestre a continuación un diagrama de barras horizontales con esos datos. Las barras
del diagrama se pueden dibujar a base de la concatenación de una imagen.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      img{
        box-shadow: 3px 6px 12px 0px;
      }
      
    </style>
    
  </head>
  <body>
    <?php
    //si la temp no recibe nada entrq
    if(!isset($_GET['temp'])){
      //crea array de meses
      $mes = ["Enero","Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ];
    ?>
      <!-- pide los datos-->
      <h1>Introduce la temperatura de los meses</h1>
      <form action="Barratemperatura.php" method="GET">
        <table>
    <?php 
        for($i = 0; $i < 12; $i++){ //pide los datos de cada mes
          echo "<tr><td>$mes[$i]:  </td>";
          echo "<td><input type=\"number\" name=\"temp[$mes[$i]]\" id=\"numeroId\" step=\"1\" ></td></tr>";
        }
    ?>
        </table>
        <input type="submit" value="Continuar">
      </form>
    <?php
    } else {
      $temp = $_GET['temp'];
      
      //pinta diagrama
      echo "<table>";
      foreach($temp as $mes => $temperatura) {
        echo "<tr><td>", $mes, "</td><td>"; //pinta el mes
        
        //crea la barra con imagenes
        for($i = 0; $i < $temperatura; $i++){
          echo "<img src=\"barra.jpg\">";
        }
       
        //muestra los grados
        echo "  ",$temperatura, "Cº</br></td></tr>";
        
      }
      echo "</table>";
    }
    ?>
  </body>
</html>
