<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	<nav>
		<a href="index.html" class="cambio">  Inicio </a>
		<a href="rubro.php" class="cambio"> Volver </a>
	</nav>
	<header> 
		<h1 align="center">Nuevo Rubro</h1>
	</header>
	<article>
		<form action="add_rubro.php" method="post" name="form">
		<p class="rubro1"> Rubro: <input type="text" name="rubro"> </p>
		<p> Descripcion: <input type="text" name="desc"> </p>
		<p>
			<input type="Submit" class="boton" value="Guardar"/>
			<input name="Cancelar" type="button" class="boton2" onClick="location.href='rubro.php'" value="Cancelar"/>
		</p>
		</form>
		
	</article>
</body>
</html>
