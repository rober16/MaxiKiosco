<?php
include'conexion.php';

$product=$_POST["product"];
$desc=$_POST["desc"];
$cod=$_POST["cod"];
$precio=$_POST["precio"];
$rubro=$_POST["rubro"];


if(isset($product) && !empty($product) && isset($desc) && !empty($desc) && isset($cod) && !empty($cod) && isset($precio) && !empty($precio) 
   && isset($rubro) && $rubro!="-1")
   {
	//comprobar si ya existe
	$sql = "SELECT * FROM `Productos`";
	$rs = $bdmotor->query($sql);
	while ($row=$rs->fetch_row())				
	{
		if($product==$row[1] && $desc==$row[2] || $cod==$row[3])
		{
			$msj="<a href=\"nuevo_producto.php\"> Volver </a>";
			die("elementos existentes ".$msj);
		}
	}
	//insertar 
	$sql = "INSERT INTO `Productos`(`Productos_id`, `Productos_nombre`,`Productos_descripcion`,`Productos_codigo`,`Productos_precio`,`Rubros_id`)
	VALUES (NULL,'$product','$desc','$cod','$precio','$rubro')";
	$rs = $bdmotor->query($sql);
	if($bdmotor->connect_errno)
	{
		die("Error de SQL: ".$bdmotor->connect_errno);
	}
	else 
	{
		header('Location: producto.php'); 
	}   
   }
else
{
	$msj="<a href=\"nuevo_producto.php\"> Volver </a>";
	die("elementos vacios ".$msj);
}
?>
