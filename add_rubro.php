<?php
include'conexion.php';

$rubro=$_POST["rubro"];
$desc=$_POST["desc"];

if(isset($rubro) && !empty($rubro) && isset($desc) && !empty($desc))
   {
	//comprobar si ya existe
	$sql = "SELECT * FROM `Rubros`";
	$rs = $bdmotor->query($sql);
	while ($row=$rs->fetch_row())				
	{
		if($rubro==$row[1] && $desc== $row[2])
		{
			$msj="<a href=\"nuevo_rubro.php\"> Volver </a>";
			die("elementos existentes ".$msj);
		}
	}
	//insertar 
	$sql = "INSERT INTO `Rubros`(`Rubros_id`, `Rubros_nombre`, `Rubros_descripcion`) VALUES (NULL,'$rubro','$desc')";
	$rs = $bdmotor->query($sql);
	if($bdmotor->connect_errno)
	{
		die("Error de SQL: ".$bdmotor->connect_errno);
	}
	else 
	{
		header('Location: rubro.php'); 
	}   
   }
else
{
	$msj="<a href=\"nuevo_rubro.php\"> Volver </a>";
	die("elementos vacios ".$msj);
}
?>
