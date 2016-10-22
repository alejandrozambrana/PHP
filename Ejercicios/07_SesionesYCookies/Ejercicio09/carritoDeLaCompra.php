<?php
error_reporting(E_ALL ^ E_NOTICE); //no muestra error de variables indefinida
session_start();// Inicia la sesión

//inicializa el carrito a cero
if(!isset($_SESSION['carrito'])){
  $_SESSION['carrito'] = ["malaga" => 0, "city" => 0, "united" => 0, "psg" => 0];
}

    
?>
<!DOCTYPE html>
<!--
Ejercicio 9
Amplía el ejercicio 6 de tal forma que los productos que se pueden elegir para comprar se almacenen
en cookies. La aplicación debe ofrecer, por tanto, las opciones de alta, baja y modificación de
productos.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link REL=StyleSheet HREF="css/estilos.css" TYPE="text/css" MEDIA=screen>
  </head>
  <body>
    <?php
    //array con los datos de los articulos
    if(!isset($_SESSION['articulos'])){
      $_SESSION['articulos'] = [ 
      "malaga" => [ 
          "equipo" => "Malaga C.F.", 
          "precio" => 75, 
          "imagen" => "malaga.png", 
          "nombre" => "malaga", 
          "Detalles" => "<b>CAMISETA OFICIAL</b> del Malaga C.F. con tejido <b>100% poliéster</b></br>Camiseta <b>original</b> utilizada por los jugadores del primer equipo"
                      . "</br>• Innovador patrón a rayas con un degradado desde el pecho a la patente inferior."
          ],
      "city" => [ 
          "equipo" => "Manchester City", 
          "precio" => 75, 
          "imagen" => "city.jpg", 
          "nombre" => "city",
          "Detalles" => "<b>CAMISETA OFICIAL</b> del Manchester City con tejido <b>100% poliéster</b></br>Camiseta <b>original</ utilizada por los jugadores del primer equipo"
          ],
      "united" => [ 
          "equipo" => "Manchester United", 
          "precio" => 75, 
          "imagen" => "united.jpg", 
          "nombre" => "united",
          "Detalles" => "<b>CAMISETA OFICIAL</b> del Manchester United con tejido <b>100% poliéster</b></br>Camiseta <b>original</ utilizada por los jugadores del primer equipo"
          ],
      "psg" => [ 
          "equipo" => "Paris Saint Germain", 
          "precio" => 75, 
          "imagen" => "psg.jpg",
          "nombre" => "psg",
          "Detalles" => "<b>CAMISETA OFICIAL</b> de Paris Saint Germain con tejido <b>100% poliéster</b></br>Camiseta <b>original</ utilizada por los jugadores del primer equipo"]
      ];
    }
    
    $articulos = $_SESSION['articulos'];

    ?>        
    <div id="nombreTienda">
      <h1>La Camisetilla</h1>
    </div>
    <div id="contenedor"> 
      <!--muestra articulos-->
      <table id="articulos">
        <tr>
          <td colspan="4"><h3><img src="imagenes/icoCamiseta.png" width="20px;"> Articulos</h3></td>
        </tr>
        <tr>
        <?php
        $conta = 0;
        foreach ($articulos as $clave => $elemento) {
          
        ?>
          
          <td>
            <?php
            if($conta ==3){
              echo '<p style="clear:both"></p>';
            }
            $conta++;
            ?>
            <div id="imagenes">
              <img src="imagenes/<?=$elemento['imagen']?>" width="160px" border="1">
            <div><br>
            Equipo: <?=$elemento['equipo']?> </br> Precio: <?=$elemento['precio']?> €</br>
            <div class="formularios">
              <form action="carritoDeLaCompra_Detalles.php" method="GET" >
                <input type="hidden" name="codigo" value="<?=$clave?>">
                <input type="hidden" name="accion" value="detalles">
                <input type="submit" value="Detalles" class="botonDetalles">
              </form>
            </div>
            <div class="formularios">
              <form action="carritoDeLaCompra.php" method="GET">
                <input type="hidden" name="codigo" value="<?= $clave?>">
                <input type="hidden" name="accion" value="comprar">
                <input type="submit" value="comprar" class="botonComprar">
              </form>
            </div>
            <div class="opciones">
              <form action="administracion_producto.php" method="GET">
                <input type="hidden" name="codigo" value="<?= $clave?>">
                <input type="image" src="imagenes/opciones.png" width="18">
              </form>
            </div>
          </td>
        <?php
        }
        ?>
        </tr>
      </table>
      <!-- -------------------------------------------------- -->

      <!--carrito de la compra -->
      <?php
      $codigo = $_GET['codigo'];
      $accion = $_GET['accion'];
      
     
      if($accion == "comprar"){
        $_SESSION['carrito'][$codigo]++;
      }
      
      if($accion == "eliminar"){
        $_SESSION['carrito'][$codigo] = 0;
      }
      $total = 0;
      ?>
      <table id="carrito">
        <tr>
          <td colspan="4"><h3> <img src="imagenes/carrito.png" width="20px;"> Carrito</h3></td>
        </tr>

        <?php
        foreach ($articulos as $codigo => $elemento) {
          if($_SESSION['carrito'][$codigo] > 0){
            $total = $total + ($_SESSION['carrito'][$codigo] * $elemento['precio']);
        ?>
          <tr>
            <td>
              <div id="imagenes">
                Cantidad: <?php echo $_SESSION['carrito'][$codigo]; ?></br>
                <img src="imagenes/<?=$elemento['imagen']?>" width="160px" border="1">
              <div><br>
              Equipo: <?=$elemento['equipo']?> </br> Precio: <?=$elemento['precio']?> €</br>
              <form action="carritoDeLaCompra.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="eliminar">
                <input type="submit" value="Eliminar"class="botonEliminar">
              </form>
            </td>
          </tr>
        <?php
          }
        }
        ?>
          <tr>
            <td><p>Total: <?php echo $total; ?> €</p></td>
          </tr>
      </table>
      <!-- -------------------------------------------------- -->
    </div>
    <div id="alta">
      <form action="alta_articulos.php" method="GET">
        <input type="submit" value="Alta producto" class="botonDetalles">
      </form>
    </div>
  </body>
</html>
