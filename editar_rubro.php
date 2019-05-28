<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio" >  Inicio </a>
		<a href="rubro.php" class="cambio"> Volver </a>
	</nav>
	<header> 
		<h1 align="center">Editar Rubro</h1>
	</header>
	<article>
		<form action="edit_rubro.php" method="post" name="form">
		<?php
		include 'conexion.php';
		$id=$_GET["id"];
		$sql = "SELECT * FROM `Rubros` WHERE `Rubros`.`Rubros_id` = $id";
		$rs = $bdmotor->query($sql);
		while ($row=$rs->fetch_array(MYSQLI_ASSOC))
		{
			$nombre= $row["Rubros_nombre"];
			$desc= $row["Rubros_descripcion"];
			echo "<p class=\"rubro2\"> ID: <input type=\"text\" name=\"id\" value=\"$id\" readonly=\"readonly\"> </p>";
			echo "<p class=\"rubro1\"> Rubro: <input type=\"text\" name=\"rubro\" value=\"$nombre\"> </p>";
			echo "<p> Descripcion: <input type=\"text\" name=\"desc\" value=\"$desc\"> </p>";
		}
		?>
		<p>
			<input type="Submit" class="boton" value="Guardar"/>
			<input name="Cancelar" type="button" class="boton2" onClick="location.href='rubro.php'" value="Cancelar"/>
		</p>
		</form>
	</article>
</body>
</html>