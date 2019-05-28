<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio">  Inicio </a>
		<a href="items.php" class="cambio"> Nuevo </a>
	</nav>
	<header> 
		<h1 align="center">Listado de Ventas</h1>
	</header>
	<div align="center" class="content">
			<table class="tablaventas" >
				<tr>
					<td>Fecha</td>
					<td>Numero</td>
					<td>Total</td>
				</tr>		
				
			<?php
				include 'conexion.php';
				$sql = "SELECT * FROM `Ventas` WHERE `Ventas`.`Ventas_id` > 1";
				$rs = $bdmotor->query($sql);
				while ($row=$rs->fetch_array(MYSQLI_ASSOC))
				{
					echo "<tr>";
					echo "<td> ".$row["Ventas_fecha"]." </td>";
					echo "<td> ".$row["Ventas_nro"]."</td>";
					echo "<td> ".$row["Ventas_total"]."</td>";
					echo "<td> <a href=\"detalle_venta.php?id=".$row["Ventas_id"]."\"> Detalle </a> </td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	</body>
</html>