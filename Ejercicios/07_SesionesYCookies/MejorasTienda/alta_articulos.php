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
    $articulos = $_SESSION['articulos'];
    ?>
    <div id="nombreTienda">
      <h1>La Camisetilla</h1>
    </div>
    <div id="contenedor"> 
      <!--muestra Detalles del articulo-->
      <table id="articulos">
        <tr>
          <td colspan="4"><h3>Alta de Productos</h3></td>
        </tr>
        <tr>
          <td>
            <form action="realiza_alta.php" method="get">
              <table>
                <tr>
                  <td>Codigo:</td>
                  <td><input type="text" name="codigo"></td>
                </tr>
                <tr>
                  <td>Nombre:</td>
                  <td><input type="text" name="nombre" autofocus="" ></td>
                </tr>
                <tr>
                  <td>Precio:</td>
                  <td><input type="number" step="0.01" name="precio" ></td>
                </tr>
                <tr>
                  <td>Detalle:</td>
                  <td><textarea name="detalle" ></textarea></td>
                </tr>
                <tr>
                  <td>Imagen:</td>
                  <td><input type="text" name="imagen" ></td>
                </tr>
                <tr>
                  <td><input type="submit" name="accion" value="Alta"></td>
                </tr>
              </table>
            </form>
            <div id="botonVolver" >
              <form action="index.php" method="GET">
                <input type="submit" value="volver" class="botonEliminar" >
              </form>
            </div>
          </td>
        </tr>
        
      </table>
      <!-- -------------------------------------------------- -->

      <!--carrito de la compra -->
      <?php
      $codigo = $_GET['codigo'];
      $accion = $_GET['accion'];
      
      if($accion == "eliminar"){
        $_SESSION['carrito'][$codigo] = 0;
      }
      
      if($accion == "modificarCantidad"){
        $_SESSION['carrito'][$codigo] = $_GET['cantidad'];
      }
      
      if($accion == "vaciarCarrito"){
        foreach ($articulos as $clave => $elemento) {
          $_SESSION['carrito'][$elemento['nombre']] = 0;
        }
      }
      
      $total = 0;
      ?>
      <table id="carrito">
        <tr>
          <td colspan="4"><h3> <img src="imagenes/carrito.png" width="20px"> Carrito</h3></td>
        </tr>

        <?php
        foreach ($articulos as $codigo => $elemento) {
          if($_SESSION['carrito'][$codigo] > 0){
            $total = $total + ($_SESSION['carrito'][$codigo] * $elemento['precio']);
        ?>
          <tr>
            <td>
              <div id="imagenes">
                <form action="alta_articulos.php" method="GET">
                  <label for="cantidad">Cantidad:</label>
                  <input type="number" id="cantidad" name="cantidad" value="<?= $_SESSION['carrito'][$codigo]; ?>" max="99" style="width: 35px; margin-bottom: 5px;" >
                  <input type="hidden" name="codigo" value="<?=$codigo?>">
                  <input type="hidden" name="accion" value="modificarCantidad">
                  <input type="submit" value="Ok" class="botonDetalles">
                </form>
                <img src="imagenes/<?=$elemento['imagen']?>" width="160px" border="1">
              <div><br>
              <b>Equipo</b>: <?=$elemento['equipo']?> </br> <b>Precio:</b> <?=$elemento['precio']?> €</br>
              <form action="alta_articulos.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="eliminar">
                <input type="submit" value="Eliminar" class="botonEliminar">
              </form>
            </td>
          </tr>
          <?php
            $opcionesCarrito = 1;
          }
        }
        
        //pone el boton de realizar pedido y el de vaciarlo
        if($opcionesCarrito == 1){
        ?>
          <tr>
            <td><p>Total: <?php echo $total; ?> €</p></td>
          </tr>
          <tr>
            <td>
              <form action="realizarPedido.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="vaciarCarrito">
                <input type="submit" value="Realizar pedido" class="realizarPedido" >
              </form>
            </td>
          </tr>
          <tr>
            <td>
              <form action="alta_articulos.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="vaciarCarrito">
                <input type="submit" value="Vaciar Cesta" class="vaciarCarro">
              </form>
            </td>
          </tr>
        <?php
        } else {
        ?>
          <tr>
            <td><p style="text-align: center;">Carrito Vacio</p>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>
      <!-- -------------------------------------------------- -->
    </div>
  </body>
</html>
