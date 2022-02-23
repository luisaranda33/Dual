<?php
require "lib/consultas.php";
if(!isset($_GET["id"]))exit();

$id=$_GET["id"];
$BaseDatos =new consultas();
 $resultado =$BaseDatos->eliminarAlumno($id);
 if($resultado != null)
 header("Location: mostrar_alumno.php");
?>