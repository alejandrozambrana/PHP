<!DOCTYPE html>
<!--
Ejercicio 7
Realiza el control de acceso a una caja fuerte. La combinación será un número de 4 cifras. El
programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el mensaje
“Lo siento, esa no es la combinación” y si acertamos se nos dirá “La caja fuerte se ha abierto
satisfactoriamente”. Tendremos cuatro oportunidades para abrir la caja fuerte.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Caja fuerte</title>
    <style>
      *{
        margin: 0px;
      }
      body{
       background-color: #1a1a1a;
      }
      #cajaFuerte{
       width: 1000px;
        height: 682px;
        margin: auto;
      }
      #acceso{  
        text-align: center;
        margin-top: 5%;
        color: green;
      }
      #combinacion{
        margin: 0 auto;
        color: lime;
        font-size: 50px;
        position: relative;
        top:95px;
        left:550px;
      }
    </style>
  </head>
  <body>
    <?php
    $numero = $_GET['anadir'];
    $combinacion = $_GET['combinacion'];
    $anadido = $numero;
    $claveSeguridad = 1234;
    $combinacion = ($combinacion * 10) + $anadido;        
    $numeroDigitos = $combinacion; 
    $contador = 0;
    
    do{
      $numeroDigitos = floor($numeroDigitos/10);
      
      $contador++;
    }while($numeroDigitos >0);
    
    if(($combinacion == $claveSeguridad) && ($contador == 4)){
      echo "<div id=\"acceso\"><h1>ACCESO PERMITIDO</h1></div>";
      $combinacion = 0;
    } else if(($combinacion != $claveSeguridad) && ($contador == 4)){
      echo "<div id=\"acceso\"><h1>ACCESO DENEGADO</h1></div>";
      $combinacion = 0;
    }
    
    ?>
    <div id="combinacion">
      <?php echo $combinacion;?>
    </div>
    <div id="cajaFuerte">
      <img src="caja fuerte.jpg" id="cajaFuerte" alt="cajaFuerte" title="cajaFuerte" usemap="#botonesMap">
      <map name="botonesMap">
	<area shape="rect" coords="115,250,241,165" alt="cajaFuerte" href="index.php?anadir=1&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="255,250,381,165" alt="cajaFuerte" href="index.php?anadir=2&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="390,250,517,165" alt="cajaFuerte" href="index.php?anadir=3&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="115,335,241,255" alt="cajaFuerte" href="index.php?anadir=4&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="255,335,381,255" alt="cajaFuerte" href="index.php?anadir=5&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="390,335,517,255" alt="cajaFuerte" href="index.php?anadir=6&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="115,425,241,345" alt="cajaFuerte" href="index.php?anadir=7&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="255,425,381,345" alt="cajaFuerte" href="index.php?anadir=8&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="390,425,517,345" alt="cajaFuerte" href="index.php?anadir=9&&combinacion=<?=$combinacion?>">
        <area shape="rect" coords="255,515,381,435" alt="cajaFuerte" href="index.php?anadir=0&&combinacion=<?=$combinacion?>">
      </map>
      
    </div> 
        <form action="index.php" method="GET">
          <input type="hidden" name="anadir" value="<?php echo $anadir ; ?>">
          <input type="hidden" name="combinacion" value="<?php echo $combinacion ; ?>">
        </form>
    <?php  
        
    ?>
      
  </body>
</html>
