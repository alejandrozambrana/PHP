<!DOCTYPE html>
<!--
Ejercicio 15
Realiza un programa que nos diga si hay probabilidad de que nuestra pareja nos está siendo
infiel. El programa irá haciendo preguntas que el usuario contestará con verdadero o falso. Puedes
utilizar radio buttons. Cada pregunta contestada como verdadero sumará 3 puntos. Las preguntas
contestadas con falso no suman puntos. Utiliza el fichero test_infidelidad.txt² para obtener las
preguntas y las conclusiones del programa.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cuestionario de fidelidad</title>
        <style>
            body{
              background-color: #ffffcc;

            }
            #contenedor{
              width: 40%;
              margin: auto; 
              text-align: center;
            }
            #preguntas{
              text-align: justify;
            }
            
          </style>
    </head>
    <body>
        <div id="contenedor">
          <h1>Test de infidelidad</h1>
          <form action="index.php" method="get">
            <div id="preguntas">
              <ol>
                <li>
                  Tu pareja parece estar más inquieta de lo normal sin ningún motivo aparente.</br>
                  <input type="radio" name="r1" value="3"> Verdadero
                  <input type="radio" name="r1" value="0"> Falso</br></br>
                </li>
                
                <li>
                  Ha aumentado sus gastos de vestuario</br>
                  <input type="radio" name="r2" value="3"> Verdadero
                  <input type="radio" name="r2" value="0"> Falso</br></br>
                </li>
                
                <li>
                  Ha perdido el interés que mostraba anteriormente por ti</br>
                  <input type="radio" name="r3" value="3"> Verdadero
                  <input type="radio" name="r3" value="0"> Falso</br></br>
                </li>
                
                <li>
                  Ahora se afeita y se asea con más frecuencia (si es hombre) o 
                  ahora se arregla el pelo y se asea con más frecuencia (si es mujer)</br>
                  <input type="radio" name="r4" value="3"> Verdadero
                  <input type="radio" name="r4" value="0"> Falso</br></br>
                </li>
                
                <li>
                  No te deja que mires la agenda de su teléfono móvil</br>
                  <input type="radio" name="r5" value="3"> Verdadero
                  <input type="radio" name="r5" value="0"> Falso</br></br>
                </li>
                
                <li>
                  A veces tiene llamadas que dice no querer contestar cuando estás tú delante</br>
                  <input type="radio" name="r6" value="3"> Verdadero
                  <input type="radio" name="r6" value="0"> Falso</br></br>
                </li>
                
                <li>
                  Últimamente se preocupa más en cuidar la línea y/o estar bronceado/a</br>
                  <input type="radio" name="r7" value="3"> Verdadero
                  <input type="radio" name="r7" value="0"> Falso</br></br>
                </li>
                
                <li>
                  Muchos días viene tarde después de trabajar porque dice tener mucho más trabajo</br>
                  <input type="radio" name="r8" value="3"> Verdadero
                  <input type="radio" name="r8" value="0"> Falso</br></br>
                </li>
                
                <li>
                  Has notado que últimamente se perfuma más</br>
                  <input type="radio" name="r9" value="3"> Verdadero
                  <input type="radio" name="r9" value="0"> Falso</br></br>
                </li>
                
                <li>
                  Se confunde y te dice que ha estado en sitios donde no ha ido contigo</br>
                  <input type="radio" name="r10" value="3"> Verdadero
                  <input type="radio" name="r10" value="0"> Falso</br></br>
                </li>
              </ol>
            </div>
       
            <input type="submit" value="Resultado">
          </form></br>
          
          <?php
            if(isset($_GET)){

              
              $puntuacion = 0;
              
              foreach($_GET as $respuesta) {
                $puntuacion += $respuesta;
              }
              
              if($puntuacion <= 10){
                echo "¡Enhorabuena! tu pareja parece ser totalmente fiel.";
              }
              
               if ( ($puntuacion > 11 ) && ($puntuacion <= 22) ) {
                echo "Quizás exista el peligro de otra persona en su vida o en su mente,";
                echo "aunque seguramente será algo sin importancia. No bajes la guardia.";
              }

              if ( $puntuacion >= 22 ) {
                echo "Tu pareja tiene todos los ingredientes para estar viviendo un ";
                echo "romance con otra persona. Te aconsejamos que indagues un poco más ";
                echo "y averigües qué es lo que está pasando por su cabeza.";
              }
                
              }
          ?>
        </div>
    </body>
</html>
