<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio" >  Inicio </a>
	  <a href="producto.php" class="cambio"> Volver </a>
	</nav>
<header> 
		<h1 align="center">Editar Producto</h1>
	</header>
	<article class="newproducto">
		<form action="edit_producto.php" method="post" name="form">
		<?php
		include 'conexion.php';
		$id=$_GET["id"];
		$sql = "SELECT * FROM `Productos` WHERE `Productos`.`Productos_id` = $id";
		$rs = $bdmotor->query($sql);
		while ($row=$rs->fetch_array(MYSQLI_ASSOC))
		{
			$nombre= $row["Productos_nombre"];
			$desc= $row["Productos_descripcion"];
			$cod= $row["Productos_codigo"];
			$precio= $row["Productos_precio"];
			
			echo "<p class=\"product\"> ID: <input type=\"text\" name=\"id\" value=\"$id\" readonly=\"readonly\"> </p>";
			echo "<p class=\"product\"> Producto: <input type=\"text\" name=\"product\" value=\"$nombre\"> </p>";
			echo "<p class=\"desc\"> Descripcion: <input type=\"text\" name=\"desc\" value=\"$desc\"> </p>";
			echo "<p class=\"codig\"> Codigo: <input type=\"number\" name=\"cod\" value=\"$cod\"> </p>";
			echo "<p> Precio: <input type=\"number\" name=\"precio\" value=\"$precio\"> </p>";
		}
		?>
		<p>Rubro: 
			<select name="rubro">
				<?php
				include 'conexion.php';
				$id=$_GET["id"];		
				$sql = "SELECT * FROM `Productos`,`Rubros` WHERE `Productos`.`Rubros_id`=`Rubros`.`Rubros_id` AND `Productos`.`Productos_id`= $id";
				$rs = $bdmotor->query($sql);
				while ($row=$rs->fetch_array(MYSQLI_ASSOC))
				{
					$id_aux=$row["Rubros_id"];
					$nom_aux=$row["Rubros_nombre"];
				}	
				$sql = "SELECT * FROM `Rubros`";
				$rs = $bdmotor->query($sql);
				while ($row=$rs->fetch_array(MYSQLI_ASSOC))
				{
					$id_rubro=$row["Rubros_id"];
					$nom_rubro=$row["Rubros_nombre"];
					if($id_aux==$id_rubro && $nom_aux==$nom_rubro)
					{
						echo "<option selected value=\"$id_rubro\"> $nom_rubro </option>";
					}
					else
					{
						echo "<option value=\"$id_rubro\"> $nom_rubro </option>";
					}
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