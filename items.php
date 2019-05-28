<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> 	<!-- libreria javascript-->
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#rubro').on('change', function(){
				var id = $('#rubro').val()
				$.post("cargar_Productos.php",{idRubro: id},function(productos){
					$('#product').html(productos);
				});
			});
			$('#confirmar').on('click', function(){
				$.post("verificar_items.php",function(Items){
					if(parseInt(Items) == 0){
						alert("no cargó ningun producto");
					}
					else{
						location.href="ventas.php";	
					}
				});
			});
		})
	</script>
</head>
<body>
	<nav>
		<a href="limpiar_index.php" class="cambio">  Inicio </a>
		<a href="limpiar_items.php" class="cambio"> Volver </a>
	</nav>
	<header> 
		<h1 align="center">Venta</h1>
	</header>
	<article class="items">
		<form action="add_items.php" method="post" name="form">
			<p>Rubro:
				<select name="rubro" id="rubro"> 
					<option value="0"> Elija Rubro </option>
					<?php
					include'conexion.php';
					$sql = "SELECT * FROM `Rubros`";
					$rs = $bdmotor->query($sql);
					while ($row=$rs->fetch_row())
					{
						echo "<option value=\"$row[0]\"> $row[1] </option>";
					}
					?>
				</select>
				Productos:
			<select name="product" id="product">
					
			</select>
			</p>
			<p class="cantidad">Cantidad <input type="number" min="1" name="cant"/></p>
			<input type="Submit" class="botonnuevo botonitems" value="Agregar"/>
	  </form>
	</article>
	<br><br><br><br><br><br>
	<header>
		<h1 align="center">Carrito de Productos</h1>
			<div align="center" class="content">
				<table class="productos">
					<tr>
						<td>Rubro</td>
						<td>Producto</td>
						<td>Cantidad</td>
						<td>Precio</td>
					</tr>
					
					<?php
					//$sql = "SELECT * FROM `Items` WHERE `Items`.`Ventas_id`=1";
					$sql = "SELECT * FROM `Rubros`,`Productos`,`Items` WHERE `Productos`.`Productos_id`=`Items`.`Productos_id` AND `Rubros`.`Rubros_id` = `Productos`.`Rubros_id` AND `Items`.`Ventas_id`=1";
					$rs = $bdmotor->query($sql);
					while ($row=$rs->fetch_array(MYSQLI_ASSOC))
					{
						echo "<tr>";
						echo "<td> ".$row["Rubros_nombre"]." </td>";
						echo "<td> ".$row["Productos_nombre"]."</td>";
						echo "<td> ".$row["Items_Cantidad"]."</td>";
						echo "<td> ".$row["Productos_precio"]."</td>";
						echo "<td> <a href=\"eliminar_items.php?id=".$row["Items_id"]."\"> Eliminar </a> </td>";
						echo "</tr>";
					}
					?>
				</table>
			</div>
			<br><br><br><br>
			<div align= "center" class="newproducto">
			<input type="button" class="botonnuevo2" id="confirmar" name="confirmar" value="Confirmar">
			<input type="button" class="botonnuevo" name="cancelar" Onclick="location.href='limpiar_items.php'" value="Cancelar">
			</div>
	</header>
</body>
</html>