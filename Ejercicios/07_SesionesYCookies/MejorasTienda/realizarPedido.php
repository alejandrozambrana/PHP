<?php
error_reporting(E_ALL ^ E_NOTICE); //no muestra error de variables indefinida
session_start();// Inicia la sesión

//inicializa el carrito a cero
if(!isset($_SESSION['carrito'])){
  $_SESSION['carrito'] = ["malaga" => 0, "city" => 0, "united" => 0, "psg" => 0];
}
$_SESSION['cupones'] = ["alejandro" => 20, "whopper" => 10, "descuentillo" => 5];

//hace que se pueda poner un gasto de envio con un cupon descuento
if(!isset($_SESSION['cantidadDescontada'])){
  $_SESSION['porciento'] = 0;
  $_SESSION['cantidadDescontada'] = 0;
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
      
      $cantidadDescontada = 0;
      $porciento = 0;
      if($_GET['accion'] == "aplicarCupon"){
        foreach ($_SESSION['cupones'] as $descuento => $porcentaje){
          if($_GET['cupon'] == $descuento){
            foreach ($articulos as $codigo => $elemento) {
              if($_SESSION['carrito'][$codigo] > 0){
                $porciento = $porcentaje;
                $cantidadDescontada = $articulos[$codigo]['precio'] * ($porcentaje/100);
                $articulos[$codigo]['precio'] = ($articulos[$codigo]['precio'] - $cantidadDescontada);
              }
            }
          }
        }
      }

      $total = 0;
      ?>
      <table id="articulos">
        <tr>
         <td colspan="4"><h3><img src="imagenes/icoCamiseta.png" width="20px">Detalle del Pedido</h3></td>
        </tr>

        <?php
        foreach ($articulos as $codigo => $elemento) {
          if($_SESSION['carrito'][$codigo] > 0){
            $total = $total + ($_SESSION['carrito'][$codigo] * $elemento['precio']);
        ?>
        
          <tr class="pedirProductos">  
            <td><img src="imagenes/<?=$elemento['imagen']?>" width="160px" border="1"></td>
            <td class="centrarDatosProductos">
              <b>Equipo</b>: <?=$elemento['equipo']?> </br> <b>Precio:</b> <?=$elemento['precio']?> €</br>
              <form action="carritoDeLaCompra_Detalles.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="eliminar">
                <input type="submit" value="Eliminar" class="botonEliminar">
              </form>
            </td>
            <td class="centrarDatosProductos">
              <form action="carritoDeLaCompra_Detalles.php" method="GET">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="<?= $_SESSION['carrito'][$codigo]; ?>" min="0" max="99" style="width: 35px; margin-bottom: 5px;" >
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="modificarCantidad">
                <input type="submit" value="Ok" class="botonDetalles">
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
            <td><p>Porcentaje: <?php echo $porciento; ?>% </br>
                Descuento: -<?php echo $cantidadDescontada; ?> € </br>
                Total: <?php echo $total;?> €</p></td>
          </tr>
          <tr>
            <td>
              <form action="pedidoRealizado.php" method="GET">
                <input type="hidden" name="codigo" value="<?=$codigo?>">
                <input type="hidden" name="accion" value="vaciarCarrito">
                <input type="submit" value="Realizar pedido" class="realizarPedido" >
              </form>
            </td>
          </tr>
          <tr>
            <td>
              <form action="index.php" method="GET">
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
      <table id="carrito">
        <tr>
          <td colspan="4"><h3> <img src="imagenes/envio.png" width="20px"> Envio</h3></td>
        </tr>
        <tr>
          <td>
            <form action="realizarPedido.php" method="GET" style="margin-left: 20px;">
              <input type="text" id="cupon" name="cupon" style="width: 100px;">
              <input type="hidden" name="codigo" value="<?=$codigo?>">
              <input type="hidden" name="accion" value="aplicarCupon">
              <input type="submit" value="Usar Cupon" id="usarCupon">
            </form>
          </td>
        </tr>
        <!-- gastos de envio 
        <tr>
         <td></br>
            <form action="realizarPedido.php" method="GET" style="text-align: center;">
              <label for="gastosEnvio">Gastos de envio:</label><br>
              <select id="gastosEnvio" name="gastosEnvio" >
                <option value="6">España</option>
                <option value="12">Europa</option>
                <option value="20">China</option>
                <option value="20">EEUU</option>
              </select>
              <input type="hidden" name="codigo" value="<?=$codigo?>">
              <input type="hidden" name="accion" value="gastosEnvio">
              <input type="submit" value="ok" class="botonEliminar">
            </form>
          </td>
        </tr>-->
        
      </table>
      <!-- -------------------------------------------------- -->
      
    </div>
  </body>
</html>
