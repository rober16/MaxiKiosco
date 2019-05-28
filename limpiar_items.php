<?php
include'conexion.php';

$id=$_GET["id"];
$sql = "DELETE FROM `Items` WHERE `Items`.`Ventas_id` = 1";
$rs = $bdmotor->query($sql);
if($bdmotor->connect_errno)
{
	die("Error de SQL: ".$bdmotor->connect_errno);
}
else 
{   
	header('Location: listar_ventas.php');
}
?>