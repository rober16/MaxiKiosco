<?php
include'conexion.php';

$id=$_GET["id"];
$sql = "DELETE FROM `Rubros` WHERE `Rubros`.`Rubros_id` = $id";
$rs = $bdmotor->query($sql);
if($bdmotor->connect_errno)
{
	die("Error de SQL: ".$bdmotor->connect_errno);
}
else 
{   
	echo "Se ha eliminado con exito!";
	echo "<a href=\"rubro.php?\"> Volver al menu </a>";
}
?>