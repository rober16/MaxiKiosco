<?php
include'conexion.php';
$id=$_POST["id"];
$product=$_POST["product"];
$desc=$_POST["desc"];
$cod=$_POST["cod"];
$precio=$_POST["precio"];
$rubro=$_POST["rubro"];


if(isset($product) && !empty($product) && isset($desc) && !empty($desc) && isset($cod) && !empty($cod) && isset($precio) && !empty($precio))
{
	$sql = "SELECT * FROM `Productos`";
	$rs = $bdmotor->query($sql);
	while ($row=$rs->fetch_row())				
	{
		if($product==$row[1] && $desc== $row[2] && $id != $row[0] && $cod==$row[3] )
		{
			$msj="<a href=\"producto.php\"> Volver </a>";
			die("elementos existentes ".$msj);
		}
	}
	$sql = "UPDATE `Productos` SET `Productos_nombre`='$product', `Productos_descripcion`='$desc', `Productos_codigo`='$cod', `Productos_precio`='$precio', `Rubros_id`='$rubro' WHERE `Productos`.`Productos_id` = $id";
	$rs = $bdmotor->query($sql);
	if($bdmotor->connect_errno)
	{
		die("Error de SQL: ".$bdmotor->connect_errno);
	}
	else 
	{   
		echo "Se modificaron los elementos con exito!";
		echo "<a href=\"producto.php?\"> Volver al menu </a>";
	}
}
else
{
	$msj="<a href=\"producto.php\"> Volver </a>";
	die("elementos vacios ".$msj);
}
?>