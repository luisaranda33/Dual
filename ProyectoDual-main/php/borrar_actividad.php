<?php
require "lib/consultas.php";
if(!isset($_GET["id"]))exit();

$id=$_GET["id"];
$BaseDatos =new consultas();
 $resultado =$BaseDatos->eliminarActividad($id);
 header("Location: mostrar_actividad.php");
?>