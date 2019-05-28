<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio">  Inicio </a>
		<a href="nuevo_producto.php" class="cambio"> Nuevo </a>
	</nav>
	<header> 
		<h1 align="center">Listado de Productos</h1>
	</header>
	<div align="center" class="content">
			<table class="productos" >
				<tr>
					<td>Nombre</td>
					<td>Descripcion</td>
					<td>Codigo</td>
					<td>Precio</td>
					<td>Rubro</td>
					<td>Descripcion de Rubro</td>
				</tr>		
				
			<?php
				include 'conexion.php';
				$sql = "SELECT * FROM `Productos`,`Rubros` WHERE `Productos`.`Rubros_id` = `Rubros`.`Rubros_id`";
				$rs = $bdmotor->query($sql);
				while ($row=$rs->fetch_array(MYSQLI_ASSOC))
				{
					$max=sizeof($row);
					echo "<tr>";
					echo "<td> ".$row["Productos_nombre"]."</td>";
					echo "<td> ".$row["Productos_descripcion"]."</td>";
					echo "<td> ".$row["Productos_codigo"]."</td>";
					echo "<td> ".$row["Productos_precio"]."</td>";
					echo "<td> ".$row["Rubros_nombre"]."</td>";
					echo "<td> ".$row["Rubros_descripcion"]."</td>";
					echo "<td> <a href=\"editar_producto.php?id=".$row["Productos_id"]."\"> Editar </a> </td>";
					echo "<td> <a href=\"eliminar_producto.php?id=".$row["Productos_id"]."\"> Eliminar </a> </td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	</body>
</html>