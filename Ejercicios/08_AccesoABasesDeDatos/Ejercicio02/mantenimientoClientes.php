<?php
error_reporting(E_ALL ^ E_NOTICE); //no muestra error de variables indefinida
session_start();

if(!isset($_SESSION['pagina'])) {
    $_SESSION['pagina'] = 1;
}
?>
<!DOCTYPE html>
<!--
Ejercicio 2
Modifica el programa anterior añadiendo las siguientes mejoras:
• El listado debe aparecer paginado en caso de que haya muchos clientes.
• Al hacer un alta, se debe comprobar que no exista ningún cliente con el DNI introducido en
el formulario.
• La opción de borrado debe pedir confirmación.
• Cuando se realice la modificación de los datos de un cliente, los campos que no se han
cambiado deberán permanecer inalterados en la base de datos.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <!--css materialize-->
    <link href="../materialize/css/materialize.css" rel="stylesheet">
    <!--iconos-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      body{
        background-color: lightblue;
      }
      .contenedorTabla{
        width: 1000px;
        margin: 0 auto;
        margin-top:30px;
        margin-bottom: 30px;
      }
      h1{
        text-align: center;
        color: white;
      }
    </style>
  </head>
  <body>
    <?php
    //comprueba si se establece conexion con mysql
    try {
      $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "root");
    } catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
    }
    //con esto se realiza una consulta
    $consulta = $conexion -> query("select * from cliente");   
    
   //comprueba la accion
    if($_GET['accion'] == "Eliminar") {
      $borra = "DELETE FROM cliente WHERE dni='$_GET[dni]'";
      $conexion->exec($borra);
      header("Refresh: 0; url=mantenimientoClientes.php");//esto redirecciona a otra pagina
    }
    
    if($_GET['accion'] == "nuevoCliente") {
      $inserta = "INSERT INTO cliente VALUES ('$_GET[dni]', '$_GET[nombre]', '$_GET[direccion]', '$_GET[telefono]')";
      $conexion->exec($inserta);
      header("Refresh: 0; url=mantenimientoClientes.php");//esto redirecciona a otra pagina
    } 
    
    if($_GET['accion'] == "aplicarModificacion") {
      $modificacion = "UPDATE cliente SET nombre='$_GET[nombre]', direccion='$_GET[direccion]', telefono='$_GET[telefono]' WHERE dni='$_GET[dni]'";
      $conexion->exec($modificacion);
      header("Refresh: 0; url=mantenimientoClientes.php");//esto redirecciona a otra pagina
    }
    
    // Determina la página que se muestra
    $numClientes = $consulta ->rowCount();
    $numPaginas = floor(abs($numClientes - 1) / 5) + 1;

    $pagina = $_GET['pagina'];

    if ($pagina == "Siguiente" && $_SESSION['pagina'] < $numPaginas) {
      $_SESSION['pagina']++;
    }

    if ($pagina == "Anterior" && $_SESSION['pagina'] > 1) {
      $_SESSION['pagina']--;
    }
    
    ?>
    <!--crea una tabla con los datos-->
    <h1>Mantenimiento Clientes</h1>
    <div class="contenedorTabla">
      <table class="striped centered">
        <tr>
          <td><b>DNI</b></td>
          <td><b>Nombre</b></td>
          <td><b>Dirección</b></td>
          <td><b>Teléfono</b></td>
          <td></td>
          <td></td>
        </tr>
      <?php
     //saca los clientes por pagina
     $listadoClientes = "SELECT * FROM cliente ORDER BY nombre LIMIT ".(($_SESSION['pagina'] - 1) * 5).", 5";
     $consulta = $conexion->query($listadoClientes);
      
      //con este while saca todos los datos de la consulta
      while ($cliente = $consulta->fetchObject()) {
        
        if($_GET['accion'] == "modificar" && $_GET['dni'] == $cliente->dni){
      ?>
          <tr> 
            <form action="mantenimientoClientes.php" method="GET">
              <input type="hidden" name="dni" value="<?=$cliente->dni?>">
              <td><?=$cliente->dni?></td>
              <td><input type="text" name="nombre" value="<?=$cliente->nombre?>"></td>
              <td><input type="text" name="direccion" value="<?=$cliente->direccion?>"></td>
              <td><input type="text" name="telefono" value="<?=$cliente->telefono?>"></td>
              <input type="hidden" name="accion" value="aplicarModificacion">
              <td><button class="btn-floating blue"><i class="large material-icons">send</i></button></td>
              <td></td>
            </form>
          </tr>
      <?php
        } else {
      ?>
        <tr>
          <td><?= $cliente->dni ?></td>
          <td><?= $cliente->nombre ?></td>
          <td><?= $cliente->direccion ?></td>
          <td><?= $cliente->telefono ?></td>
          <td>
            <form action="mantenimientoClientes.php" method="GET">
              <input type="hidden" name="dni" value="<?=$cliente->dni?>">
              <input type="hidden" name="accion" value="Eliminar">
              <button class="btn-floating blue">
                <i class="large material-icons">delete</i>
              </button>
            </form>
          </td>
          <td>
            <form action="mantenimientoClientes.php" method="GET">
              <input type="hidden" name="dni" value="<?=$cliente->dni?>">  
              <input type="hidden" name="nombre" value="<?=$cliente->nombre?>">
              <input type="hidden" name="direccion" value="<?=$cliente->direccion?>">
              <input type="hidden" name="telefono" value="<?=$cliente->telefono?>">
              <input type="hidden" name="accion" value="modificar">
              <button class="btn-floating blue">
                <i class="large material-icons">mode_edit</i>
              </button>
            </form>
          </td>
        </tr>
      <?php
      }
      }
      ?>
      </table>
    </div>
    <!--boton añadir-->
    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
      <form action="mantenimientoClientes.php" method="get">
        <input type="hidden" name="accion" value="anadir">
        <button class="btn-floating btn-large blue">
          <i class="large material-icons">playlist_add</i>
        </button>
      </form>
    </div>

    <?php
    $accion = $_GET['accion'];

    if($accion == "anadir"){
    ?>
      <div class="contenedorTabla">
      <table class="striped centered">
        <tr>
          <form action="mantenimientoClientes.php" method="get">
            <td><b><input type="text" name="dni" placeholder="DNI"></b></td>
            <td><b><input type="text" name="nombre" placeholder="Nombre"></b></td>
            <td><b><input type="text" name="direccion" placeholder="Direccion"></b></td>
            <td><b><input type="tel" name="telefono" placeholder="Telefono"></b></td>
            <input type="hidden" name="accion" value="nuevoCliente">
            <td><button class="btn-floating btn-large blue"><i class="large material-icons">add</i></button></td>
          </form>
        </tr>
      </table>
    <?php
    }
   ?>
    <div class="pasaPagina">
      <table class="centered">
        <!-- Botones para pasar las páginas -->
        <tr>
          <td colspan="2">Página <?=$_SESSION['pagina']?> de <?=$numPaginas?></td>
        </tr>
        <!-- Anterior -->
        <tr>
          <td>
            <form action="mantenimientoClientes.php" method="GET">
              <button type="submit" name="pagina" value="Anterior" class="waves-effect waves-light btn blue">
                <i class="material-icons left">skip_previous</i>Anterior
              </button>
            </form>
          </td>
        <!-- Siguiente -->
          <td>
            <form action="mantenimientoClientes.php" method="GET">
              <button type="submit" name="pagina" value="Siguiente" class="waves-effect waves-light btn blue">
                <i class="material-icons right">skip_next</i>Siguiente
              </button>

            </form>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
