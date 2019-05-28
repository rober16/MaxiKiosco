<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio">  Inicio </a>
		<a href="listar_ventas.php" class="cambio"> Volver </a>
	</nav>
	<header> 
		<h1 align="center">Venta</h1>
	</header>
	<header>		 
			<?php
			include 'conexion.php';
			
			$v_id = $_GET["id"];

			$sql = "SELECT * FROM `Ventas` WHERE `Ventas`.`Ventas_id` = $v_id";
			$rs = $bdmotor->query($sql);
			$row=$rs->fetch_array(MYSQLI_ASSOC);
			$fecha = $row["Ventas_fecha"];
			$nro = $row["Ventas_nro"];
			echo "<a> Fecha: <input type=\"text\" name=\"fecha\" value=\"$fecha\" readonly=\"readonly\"> </a>";	
			echo "<a> Numero: <input type=\"text\" name=\"nro\" value=\"$nro\" readonly=\"readonly\"> </a>";			
			?>

	<h1 align="left"> Items </h1>
		<div align="left" class="top">
			<table class="productos">
					<tr>
						<td>Rubro</td>
						<td>Producto</td>
						<td>Cantidad</td>
						<td>Precio</td>

						<?php
						include 'conexion.php';
    					$v_id = $_GET["id"];
    					$sql = "SELECT * FROM `Rubros`,`Productos`,`Items` WHERE `Productos`.`Productos_id`=`Items`.`Productos_id` AND `Rubros`.`Rubros_id`=`Productos`.`Rubros_id` AND `Items`.`Ventas_id`= $v_id";
						$rs = $bdmotor->query($sql);
						while ($row=$rs->fetch_array(MYSQLI_ASSOC))
						{
							echo "<tr>";
							echo "<td> ".$row["Rubros_nombre"]." </td>";
							echo "<td> ".$row["Productos_nombre"]."</td>";
							echo "<td> ".$row["Items_Cantidad"]."</td>";
							echo "<td> ".$row["Productos_precio"]."</td>";
							echo "</tr>";
						}
						?>

					</tr>
				</table>
				<br><br><br><br>
				
				<?php
				include 'conexion.php';
				$v_id = $_GET["id"];

				$sql = "SELECT * FROM `Ventas` WHERE `Ventas`.`Ventas_id` = $v_id";
				$rs = $bdmotor->query($sql);
				$row=$rs->fetch_array(MYSQLI_ASSOC);
				$total = $row["Ventas_total"];
				echo "<p> Total: <input type=\"number\" name=\"total\" id=\"total\" readonly=\"readonly\" value=\"$total\"></p>";
				?>

			<input name="volver" type="button" class="botonnuevo2" onClick="location.href='listar_ventas.php'" value="Volver"/>
		</div>
	</header>
	</body>
</html>
