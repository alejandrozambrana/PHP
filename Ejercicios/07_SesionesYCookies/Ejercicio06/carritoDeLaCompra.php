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
Ejercicio 6
Amplía el programa anterior de tal forma que se pueda ver el detalle de un producto. Para ello, cada
uno de los productos del catálogo deberá tener un botón Detalle que, al ser accionado, debe llevar
al usuario a la vista de detalle que contendrá una descripción exhaustiva del producto en cuestión.
Se podrán añadir productos al carrito tanto desde la vista de listado como desde la vista de detalle.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        background-color: #e6e6e6;
      }
      #nombreTienda{
        text-align: center;
        background-color: #66ccff;
        width: 400px;
        height: 50px;
        margin: 0 auto;
        border-radius: 50px;
        box-shadow: 2px 2px 5px 2px grey;
      }
      
      #contenedor{
        margin: 0px auto;
	width:90%;
	background-color: white;
	margin-top:50px;
	margin-bottom:30px;
        margin-left: 60px;
	box-shadow: 5px 5px 5px #737373;
	border-radius:10px;
        position: absolute;
      }
      
      #articulos tr td h3 {
        border-bottom: 2px solid #66ccff;
        text-align: center;       
      }
      
      #articulos{
        margin-left: 100px;
        float: left;
      }
      
      #imagenes {
        margin: 0 auto;
        margin: 10px;
      }
      #carrito{
        margin-right: 100px;
        float: right;
      }
      #carrito tr td{
        width: 250px;
      }
      #carrito tr td h3 {
        border-bottom: 2px solid #66ccff;
        text-align: center;       
      }
      .botonComprar{
        text-decoration: none;
        padding: 5px;
        font-weight: 10px;
        font-size: 15px;
        color: white;
        background-color: #66ccff;
        border-radius: 16px;
        border: 2px solid #66ccff;
        box-shadow: 2px 2px 6px 1px #737373;
      }
      .botonComprar:hover{
        text-decoration: none;
        padding: 5px;
        font-weight: 10px;
        font-size: 15px;
        color: white;
        background-color: #0099e6;
        border-radius: 16px;
        border: 2px solid #0099e6;
        box-shadow: 2px 2px 6px 1px #737373;
      }
      .botonDetalles{
        border: none;
        background-color: transparent;
        text-decoration: underline;
      }
      .botonDetalles:hover{
        border: none;
        background-color: transparent;
        text-decoration: underline;
        color: #4d4d4d;
      }
      .botonEliminar{
        border: none;
        background-color: transparent;
        text-decoration: underline;
      }
      .botonEliminar:hover{
        border: none;
        background-color: transparent;
        text-decoration: underline;
        color: #4d4d4d;
      }
    </style>
  </head>
  <body>
    <?php
    //array con los datos de los articulos
    $articulos = [ 
      "malaga" => [ "equipo" => "Malaga C.F.", "precio" => 75, "imagen" => "malaga.png"],
      "city" => [ "equipo" => "Manchester City", "precio" => 75, "imagen" => "city.jpg"],
      "united" => [ "equipo" => "Manchester United", "precio" => 75, "imagen" => "united.jpg"],
      "psg" => [ "equipo" => "Paris Saint Germain", "precio" => 75, "imagen" => "psg.jpg"]
    ];
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
        foreach ($articulos as $clave => $elemento) {
        ?>
          
          <td><div id="imagenes"><img src="imagenes/<?=$elemento['imagen']?>" width="160" border="1"><div><br>
          Equipo: <?=$elemento['equipo']?> </br> Precio: <?=$elemento['precio']?> €</br>
          <form action="carritoDeLaCompra_Detalles.php" method="GET">
            <input type="hidden" name="codigo" value="<?=$clave?>">
            <input type="hidden" name="accion" value="detalles">
            <input type="submit" value="Detalles" class="botonDetalles">
          </form>
          <form action="carritoDeLaCompra.php" method="GET">
            <input type="hidden" name="codigo" value="<?=$clave?>">
            <input type="hidden" name="accion" value="comprar">
            <input type="submit" value="Comprar" class="botonComprar">
          </form></td>

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
            <td><div id="imagenes">cantidad: <?php echo $_SESSION['carrito'][$codigo]; ?></br>
            <img src="imagenes/<?=$elemento['imagen']?>" width="160" border="1"><div><br>
            Equipo: <?=$elemento['equipo']?> </br> Precio: <?=$elemento['precio']?> €</br>
            <form action="carritoDeLaCompra.php" method="GET">
              <input type="hidden" name="codigo" value="<?=$codigo?>">
              <input type="hidden" name="accion" value="eliminar">
              <input type="submit" value="Eliminar"class="botonEliminar">
            </form></td>
          </tr>
        <?php
          }
        }
        ?>
          <tr>
            <td>Total: <?php echo $total; ?> €</td>
          </tr>
      </table>
      <!-- -------------------------------------------------- -->
    </div>
  </body>
</html>
