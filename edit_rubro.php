<?php
include'conexion.php';
$id= $_POST["id"];
$rubro=$_POST["rubro"];
$desc=$_POST["desc"];

if(isset($rubro) && !empty($rubro) && isset($desc) && !empty($desc))
{
	$sql = "SELECT * FROM `Rubros`";
	$rs = $bdmotor->query($sql);
	while ($row=$rs->fetch_row())				
	{
		if($rubro==$row[1] && $desc== $row[2] && $id !=$row[0])
		{
			$msj="<a href=\"rubro.php\"> Volver </a>";
			die("elementos existentes ".$msj);
		}
	}
	$sql = "UPDATE `Rubros` SET `Rubros_nombre` = '$rubro', `Rubros_descripcion` ='$desc' WHERE `Rubros`.`Rubros_id` = $id";
	$rs = $bdmotor->query($sql);
	if($bdmotor->connect_errno)
	{
		die("Error de SQL: ".$bdmotor->connect_errno);
	}
	else 
	{   
		echo "Se modificaron los elementos con exito!";
		echo "<a href=\"rubro.php?\"> Volver al menu </a>";
	}
}
else
{
	$msj="<a href=\"rubro.php\"> Volver </a>";
	die("elementos vacios ".$msj);
}
?>