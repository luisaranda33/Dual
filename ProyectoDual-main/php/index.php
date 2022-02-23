<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <!--Meta Tags Requeridos-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link estilos boostrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/local.css">

</head>

<body>


    <!--PNG logo Cesur-->
    <div class="container-menu">
    <div class="container-boton">
            <p>
                    <?php
                        echo "Bienvenido, <strong>".$_SESSION["Nombre"]."</strong>";
                    ?>
                    <br>
                    <a href="../index.php"><input type="button" class="btn btn-info" value="Cerrar Sesi&oacute;n"></a>
            </p>
    </div>
    <div> <img class="logocesur" src="../img/CESUR-web.png" alt="Cesur Logo"></div>
    </div>
    <?php

        switch ($_SESSION["Rol"]) {
                case '0':

                        echo '<div class="botonPadre">

                        <a href="añadirAlumno.php"> <input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="Añadir alumno"></a> <br>
                
                        <a href="formularioProfesor.php"> <input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="Añadir profesor"></a> <br>
                
                
                        <a href="añadir_empresa.php"> <input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="añadir empresas"></a> <br>
                        
                        <a href="formularioActividad.php"><input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="Añadir nueva actividad"></a><br>
                
                        <a href="../php/mostrar_alumno.php"> <input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="Mostrar alumnos"></a> <br>
                                
                        <a href="../php/mostrar_profesor.php"> <input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="Mostrar profesor"></a> <br>
                
                        <a href="../php/mostrar_empresa.php"> <input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="Mostrar empresas"></a> <br>
                
                        <a href="../php/mostrar_actividad.php"> <input type="button" class="btn btn-primary btn-lg  boton-form"
                                value="Mostrar actividad de alumnos"></a>
                
                    </div>';
                        break;

                case '1':

                        echo '<div class="botonPadre">

                        <a href="añadirAlumno.php"> <input type="button" class="btn btn-primary btn-lg boton-form"
                                value="Añadir alumno"></a> <br>
                
                        <a href="añadir_empresa.php"> <input type="button" class="btn btn-primary btn-lg boton-form"
                                value="añadir empresas"></a> <br>
                
                
                        <a href="../php/mostrar_alumno.php"> <input type="button" class="btn btn-primary btn-lg boton-form"
                                value="Mostrar alumnos"></a> <br>
                                
                        <a href="../php/mostrar_profesor.php"> <input type="button" class="btn btn-primary btn-lg boton-form"
                                value="Mostrar profesor"></a> <br>
                
                        <a href="../php/mostrar_empresa.php"> <input type="button" class="btn btn-primary btn-lg boton-form"
                                value="Mostrar empresas"></a> <br>
                
                        <a href="../php/mostrar_actividad.php"> <input type="button" class="btn btn-primary btn-lg boton-form"
                                value="Mostrar actividad de alumnos"></a>
                
                    </div>';
                        break;

                case '2':
                        echo '<div class="botonPadre">

                        <a href="formularioActividad.php"><input type="button" class="btn btn-primary btn-lg boton-form"
                        value="Añadir nueva actividad"></a><br>

                
                        <a href="../php/mostrar_actividad.php"> <input type="button" class="btn btn-primary btn-lg boton-form"
                                value="Mostrar actividad de alumnos"></a>
                
                    </div>';
                        break;
                
                default:
                        echo "erró";
                        header('location: ../index.php');
                        break;
        }

    ?>
</body>

</html>