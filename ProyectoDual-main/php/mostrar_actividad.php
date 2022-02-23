<?php

session_start();

   require 'lib/consultas.php';
   $BaseDatos=new consultas();

   switch ($_SESSION["Rol"]) {
        case '0':
            // Administrador
            $mensaje_h1 = "Mostrando toda actividad para la administraci&oacute;n.";
            $resultado=$BaseDatos->mostraractividad();
            break;

        case '1':
            // Profesor

            $mensaje_h1 = "Actividad de los alumnos a cargo de ".$_SESSION["Nombre"];

            $resultado=$BaseDatos->mostrarActividadProfe($_SESSION["ID"]);
            
            break;

        case '2':
            // Alumno
            $mensaje_h1 = "Mi actividad (".$_SESSION["Nombre"].")";

            $resultado=$BaseDatos->mostrarActividadAlu2($_SESSION["ID"]);

            break;
       
        default:
            // No tiene rol?
            header('location: index.php');
            break;
   }

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <!--Meta Tags Requeridos-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Link estilos boostrap-->
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/local.css">

</head>



<body class="text-center">


    <div class="encabezado">
        <img class="logo" alt="logo" src="../img/CESUR-web.png">
    </div>

    <h3><?php echo $mensaje_h1 ?></h3>

    <a href="index.php"><input type="button" class="btn btn-secondary btn-lg" value="HOME"></a>

    <div class="tablon">
        <table id="tabla" class="display table">
            <thead>
                <tr>
                    <th> ID_Actividad </th>
                    <th> Alumno </th>
                    <th> Tutor </th>
                    <th> Fecha </th>
                    <th> Tipo_práctica </th>
                    <th> Total_Horas </th>
                    <th> Actividad_realizada </th>
                    <th> Observaciones </th>
                </tr>
            </thead>
            <tbody>
                <?php
        foreach($resultado as $actividad){
            echo "<tr>";
                echo "<td>".$actividad["ID_Actividad"]."</td>";
                echo "<td>".$actividad["nAlumno"]." ".$actividad["alApe1"]." ".$actividad["alApe2"]."</td>";
                echo "<td>".$actividad["nProfe"]." ".$actividad["pApe1"]." ".$actividad["pApe2"]."</td>";
                echo "<td>".$actividad["Fecha"]."</td>";
                echo "<td>".$actividad["Tipo_práctica"]."</td>";
                echo "<td>".$actividad["Total_Horas"]."</td>";
                echo "<td>".$actividad["Actividad_realizada"]."</td>";
                echo "<td><a  href=borrar_actividad.php?id=". $actividad["ID_Actividad"].">Eliminar</a>.</td>";
                echo "<td><a  href=update actividad_actividad.php?id=". $actividad["ID_Actividad"].">Modificar</a>.</td>";
                

            echo "</tr>";
        }
        
?>




                <script>
                jQuery(document).ready(function() {
                    $('#tabla').DataTable({
                        "language": {
                            "url": "../js/es_es.json"
                        }
                    });
                });
                </script>
</body>

</html>