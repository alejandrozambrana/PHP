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
    $articulos = $_SESSION['articulos'];
    ?>
    <div id="nombreTienda">
      <h1>La Camisetilla</h1>
    </div>
    <div id="contenedor"> 
      <!--muestra Detalles del articulo-->
      <table id="articulos">
        <tr>
          <td colspan="4"><h3>Administracion</h3></td>
        </tr>
        <tr>
        <?php
        $codigo = $_GET['codigo'];
        foreach ($articulos as $clave => $elemento) {
          if($codigo == $elemento['nombre']){
        ?>
          
          <td id="camisetaImagen">
            <div id="imagenes">
              <img src="imagenes/<?=$elemento['imagen']?>" width="360px" border="1">
            </div><br>
            Equipo: <?=$elemento['equipo']?> </br> Precio: <?=$elemento['precio']?> €</br></br>
            <div class="formularios" style="margin-right: 10px;">
              <form action="administracion_producto.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$clave?>">
                <input type="hidden" name="accion" value="modificarProducto">
                <input type="submit" value="Modificar" >
              </form>
            </div>
            <div class="formularios">
              <form action="administracion_producto.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$clave?>">
                <input type="hidden" name="accion" value="eliminarProducto">
                <input type="submit" value="Eliminar producto" >
              </form>
            </div>
            <div id="botonVolver" >
            <form action="index.php" method="GET">
              <input type="submit" value="volver" class="botonEliminar" >
            </form>
            </div>
          </td>
          
        <?php
          }
        }
        ?>
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
      
      if($accion == "modificarProducto"){
        
      ?>
      <div id="modificar">
        <form action="modificacion_articulos.php" method="get">
        <table>
          <tr>
            <td><input type="hidden" name="codigo" value="<?= $codigo ?>"></td>
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
            <td><input type="submit" name="accion" value="Modificar"></td>
          </tr>
        </table>
        </form>
      </div>
      
      <?php
      }
      
      if($accion == "eliminarProducto"){
        unset($_SESSION['carrito'][$codigo]);
        unset($_SESSION['articulos'][$codigo]);
         header("Refresh: 0; url=index.php");//esto redirecciona a otra pagina
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
                Cantidad: <?php echo $_SESSION['carrito'][$codigo]; ?>
                <img src="imagenes/<?=$elemento['imagen']?>" width="160px" border="1">
              <div><br>
              Equipo: <?=$elemento['equipo']?> </br> Precio: <?=$elemento['precio']?> €</br>
              <form action="administracion_producto.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="eliminar">
                <input type="submit" value="Eliminar" class="botonEliminar">
              </form>
            </td>
          </tr>
          <tr>
            <td>Total: <?php echo $total; ?> €</td>
          </tr>
        <?php
          }
        }
        ?>
      </table>
      <!-- -------------------------------------------------- -->
    </div>
  </body>
</html>
