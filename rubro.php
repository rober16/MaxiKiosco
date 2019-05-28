<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio">  Inicio </a>
		<a href="nuevo_rubro.php" class="cambio"> Nuevo </a>
	</nav>
	<header> 
		<h1 align="center">Listado de Rubros</h1>
	</header>
	<div align="center" class="content">
		<table class="normal" summary="Tabla genérica">
				<tr>
					<td>Nombre</td>
					<td>Descripcion</td>
				</tr>	
			
			<?php
				include 'conexion.php';
				$sql = "SELECT * FROM `Rubros`";
				$rs = $bdmotor->query($sql);
				while ($row=$rs->fetch_array(MYSQLI_ASSOC))
				{
					$max=sizeof($row);
					echo "<tr>";
					echo "<td> ".$row["Rubros_nombre"]."</td>";
					echo "<td> ".$row["Rubros_descripcion"]."</td>";
					echo "<td> <a href=\"editar_rubro.php?id=".$row["Rubros_id"]."\"> Editar </a> </td>";
					echo "<td> <a href=\"eliminar_rubro.php?id=".$row["Rubros_id"]."\"> Eliminar </a> </td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	</body>
</html>