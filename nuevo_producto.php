<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio">  Inicio </a>
		<a href="producto.php" class="cambio"> Volver </a>
	</nav>
	<header> 
		<h1 align="center">Nuevo Producto</h1>
	</header>
	<article class="newproducto">
		<form action="add_producto.php" method="post" name="form">
		<p class="product"> Producto: <input type="text" name="product"> </p>
		<p class="desc"> Descripcion: <input type="text" name="desc"> </p>
		<p class="codig"> Codigo: <input type="number" name="cod"> </p>
		<p> Precio: <input type="number" name="precio"> </p>	
		<p> Rubro:
			<select name="rubro">
				 <option value="-1"> Elija rubro </option>
			<?php 		
			include 'conexion.php';
			$sql = "SELECT * FROM `Rubros`";
			$rs = $bdmotor->query($sql);
			while ($row=$rs->fetch_row())
			{
				echo "<option value=\"$row[0]\"> $row[1] </option>";
			}
			?>
			</select>
		</p>
		<p>
			<input type="Submit" class="botonnuevo" value="Guardar"/>
			<input name="Cancelar" type="button" class="botonnuevo2" onClick="location.href='producto.php'" value="Cancelar"/>
		</p>
	  </form>
	</article>
</body>
</html>
