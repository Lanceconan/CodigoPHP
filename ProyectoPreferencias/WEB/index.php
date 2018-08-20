<!DOCTYPE html>
<html>
	<script type="text/javascript" src="js/alertas.js"></script>
<head>
	<title>Encuesta de preferencia</title>
</head>
<body>
<ul>
	<li><a href="pelicula.php"> Agregar Genero Cinematográfico</a></li>
	<li><a href="musica.php"> Agregar Estilo Musical</a></li>
</ul>

<form action="controller/controller.php" method="post" name="registro de Datos">

	<fieldset>
		<legend>Datos del Visitante</legend>
		Nombre:<br>
		<input type="text" name="nombre" value="" size="30"><br><br>
		Apellido:<br>
		<input type="text" name="" value="" size="30"><br><br>
		Correo:<br>
		<input type="text" name="" value="" size="30"><br><br>
		Fecha Nacimiento:<br>
		<input type="text" name="" value="" size="30"><br><br>
		Nacionalidad:<br>
		<select name="nacionalidad">
			
		</select>
	</fieldset>

	<fieldset>
		<legend>Preferencias</legend>
		Estilo Musical:<br>
		
		Genero Cinematográfico:<br>
		
	</fieldset>

	<br><br>
	<button type="submit" name="registrar" onclick="registrar()">  Registrar  <img src="images/save.png" alt="registrar"></button>
	<button type="reset" onclick="limpiar()">  Limpiar  <img src="images/delete.png" alt="limpiar"></button>

</form>

</body>
</html>