<?php
session_start();// Inicia la sesión

if(!isset($_SESSION['usuario']) && !isset($_SESSION['contraseña'])) {//comprueba que la variable no esta iniciada.
$_SESSION['usuario'] = "";
$_SESSION['contraseña'] = "";
}

?>
<!DOCTYPE html>
<!--
Ejercicio 4
Establece un control de acceso mediante nombre de usuario y contraseña para cualquiera de los
programas de la relación anterior. La aplicación no nos dejará continuar hasta que iniciemos sesión
con un nombre de usuario y contraseña correctos.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
    <style>
      body{
        background-color: #b380ff;
      }
      #acceso{
        background-color:  #002e4d;
        width:300px;
        height: 250px;
        text-align: center;
        margin: 0 auto;
        padding-top: 20px;
        color:white;
        margin-top: 50px;
        border-radius: 40px;
      }
      #contrasenaError{
        text-align: center;
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <?php
      $_SESSION['usuario'] = $_GET['usuario'];
      $_SESSION['contraseña'] = $_GET['contraseña'];
    
      if(($_SESSION['usuario'] != "alejandro") && ($_SESSION['contraseña'] != "1234")){ //su usuario y contraseña es incorrecto
    ?>
        <div id="acceso">
          <h1>Control de Acceso</h1>
          <form action="ControlDeAcceso.php" method="GET">
            <label for="usuarioId">Usuario</label></br>
            <input type="text" name="usuario" id="usuarioId" placeholder="usuario" autofocus></br>
            <label for="contraseñaId">Contraseña</label></br>
            <input type="password" name="contraseña" id="contraseñaId" placeholder="********"></br></br>
            <input type="submit" value="Acceder">
          </form>
        </div>
    <?php
      }else{
        header("Refresh: 0; url=../Ejercicio03/sumaNoSuperiorA10000.php");//esto redirecciona a otra pagina
      }
      if(($_SESSION['usuario'] == "alejandro") && ($_SESSION['contraseña'] != "1234")){//si la contaseña es diferente y el usuario correcto
        echo '<div id="contrasenaError">';
        echo '<img src="cargar.gif" > </br>';
        echo 'Contraseña fallida';
        echo '</div><br><br>';
        header("Refresh: 3; url=ControlDeAcceso.php");//esto redirecciona a otra pagina
      }
      if(($_SESSION['usuario'] != "alejandro") && ($_SESSION['contraseña'] == "1234")){//usuario incorrecto y contraseña correcta
        echo '<div id="contrasenaError">';
        echo '<img src="cargar.gif" > </br>';
        echo 'El usuario no Existe';
        echo '</div><br><br>';
        header("Refresh: 3; url=ControlDeAcceso.php");//esto redirecciona a otra pagina
      }
      
    ?>
  </body>
</html>
