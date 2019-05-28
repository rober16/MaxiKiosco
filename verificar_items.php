<?php 
include 'conexion.php';
	
$sql = "SELECT * FROM `Items` WHERE `Items`.`Ventas_id`= 1";
$rs = $bdmotor->query($sql);
$row=$rs->fetch_row();
echo sizeof($row);

?>