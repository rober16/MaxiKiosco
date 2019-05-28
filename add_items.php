<?php
	include'conexion.php';

	$product=$_POST["product"];
	$cant=$_POST["cant"];

	if(isset($product) && !empty($product) && isset($cant) && !empty($cant))
	{
	$sql = "INSERT INTO `Items`(`Items_id`, `Items_Cantidad`, `Productos_id`, `Ventas_id`) VALUES (NULL,'$cant','$product', '1')";
		$rs = $bdmotor->query($sql);

		if($bdmotor->connect_errno)
	    {
	        die("Error de SQL: ".$bdmotor->connect_errno);
	    }
	    else 
	    {
	        header('Location: items.php'); 
	    }
	}
	else
	{
		header('Location: items.php');
	}
?>