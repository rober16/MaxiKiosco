<?php 
include 'conexion.php';
$id = $_POST["idRubro"];
	
$sql = "SELECT * FROM `Productos` WHERE `Productos`.`Rubros_id`= $id";
$rs = $bdmotor->query($sql);
$prod = "<option value=\"0\"> Elija Producto </option>";
while($row=$rs->fetch_row())
{
	$prod .= "<option value=\"$row[0]\"> $row[1] </option>";
}
echo $prod;
?>