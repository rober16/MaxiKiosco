<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
	</script>
	<script type="text/javascript">
		$(document).ready(function()
		{
				var sub =   $('#subtotal').val()
				var desc =  $('#desc').val()
				var total = document.getElementById('total');
				var prom = parseInt(sub) - parseInt(sub) / 100 * parseInt(desc);
				total.setAttribute('value', prom );

			$('#desc').on('input', function()
			{
				var sub =   $('#subtotal').val()
				var desc =  $('#desc').val()
				var total = document.getElementById('total');
				var prom = parseInt(sub) - parseInt(sub) / 100 * parseInt(desc);
				if(prom < 0 )	// si desc es mayor a 100
				{
					prom = 0;
				}
				total.setAttribute('value', prom );
			});
		})
	</script>
</head>
<body>
	
	<nav>
		<a href="limpiar_index.php" class="cambio">  Inicio </a>
		<a href="items.php" class="cambio"> Volver </a>
	</nav>
	<header> 
		<h1 align="center">Venta</h1>
	</header>
	<header>
		<form action="add_ventas.php" method="post" name="form">		 
			<?php
			include 'conexion.php';
			
			$date = getdate();
			$fecha = $date[year]."-".$date[mon]."-".$date[mday];
			echo "<a> Fecha: <input type=\"text\" name=\"fecha\" value=\"$fecha\" readonly=\"readonly\"> </a>";	
			
			$sql = "SELECT MAX(`Ventas_nro`) FROM `Ventas`";
			$rs = $bdmotor->query($sql);
			$row=$rs->fetch_row();
			$nro= $row[0] + 1;
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
    					$sql = "SELECT * FROM `Rubros`,`Productos`,`Items` WHERE `Productos`.`Productos_id`=`Items`.`Productos_id` AND `Rubros`.`Rubros_id`=`Productos`.`Rubros_id` AND `Items`.`Ventas_id`=1";
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
				$subtotal = 0;
				$sql = "SELECT * FROM `Productos`,`Items` WHERE `Productos`.`Productos_id`=`Items`.`Productos_id` AND `Items`.`Ventas_id`=1";
				$rs = $bdmotor->query($sql);
				while ($row=$rs->fetch_array(MYSQLI_ASSOC))
				{
					$subtotal += $row["Productos_precio"] * $row["Items_Cantidad"];
				}
				echo "<p> Subtotal: <input type=\"number\" name=\"subtotal\" id=\"subtotal\" readonly=\"readonly\" value=\"$subtotal\"></p>";
				?>
				  <p> Descuento: <input type="number" id="desc" name="desc" value="0" min="0" max="100"></p>
				  <p> Total: <input type="number" id="total" readonly="readonly" name="total"></p>
				  <input type="Submit" class="botonnuevo" value="Confirmar"/>
				  <input name="Cancelar" type="button" class="botonnuevo2" onClick="location.href='items.php'" value="Cancelar"/>
			</div>
		</form>
	</header>
	</body>
</html>
