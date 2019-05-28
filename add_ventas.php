<?php
include'conexion.php';

$fecha = $_POST["fecha"];
$nro = $_POST["nro"];
$total = $_POST["total"];

//insertar 
$sql = "INSERT INTO `Ventas`(`Ventas_id`, `Ventas_fecha`, `Ventas_nro`, `Ventas_total`) VALUES (NULL,'$fecha','$nro','$total')";
$rs = $bdmotor->query($sql);
if($bdmotor->connect_errno)
{
	die("Error de SQL: ".$bdmotor->connect_errno);
}

$sql = "SELECT MAX(`Ventas_id`) FROM `Ventas`";
$rs = $bdmotor->query($sql);
$row=$rs->fetch_row();
$nro= $row[0];   

$sql = "UPDATE `Items` SET `Ventas_id` = '$nro' WHERE `Items`.`Ventas_id`= 1";
$rs = $bdmotor->query($sql);
header('Location: index.html');

?>