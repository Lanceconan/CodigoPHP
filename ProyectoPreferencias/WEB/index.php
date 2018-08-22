<?php
				
	$host="localhost";
	$port="1680";
	$user="postgres";
	$pass="postgres";
	$dbname="db_preferencia";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
	$conexion = pg_connect($cadenaConexion) 
		or die('No se ha podido conectar: ' . pg_last_error());;
	
	$query = "SELECT pai_id, pai_nombre FROM pre_pais";
	$result = pg_query($query);
			
	$comboPais="";
	
	while($row = pg_fetch_array($result))
	{		
		$comboPais .=" <option value='".$row['pai_id']."'>".$row['pai_nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
	}

	$query = "SELECT pel_id, pel_nombre FROM pre_pelicula";
	$result = pg_query($query);

	$checkBoxPeliculas = "";

	while($row = pg_fetch_array($result))
	{
		$checkBoxPeliculas .= "<input type='checkbox' value='".$row['pel_id']."'>".$row['pel_nombre']."<br>";
	}

	$query = "SELECT mus_id, mus_nombre FROM pre_musica";
	$result = pg_query($query);

	$radioMusica = "";

	while($row = pg_fetch_array($result))
	{
		$radioMusica .= "<input type='radio' name='musica' value='".$row['mus_id']."'>".$row['mus_nombre']."<br>";
	}

	pg_close($conexion);	
?>

<!DOCTYPE html>
<html>
	<script type="text/javascript" src="js/alertas.js"></script>
<head>
	<title>Encuesta de preferencia</title>
</head>
<body>

	<ul>
		<li><a href="index.php"> Responder Encuesta</a></li>
		<li><a href="pelicula.php"> Generos Cinematográfico</a></li>
		<li><a href="musica.php"> Estilos Musical</a></li>
	</ul>

	<form action="controller/controller.php" method="post" name="registro de Datos">
		
		<fieldset>
			<legend>Datos del Visitante</legend>
			Nombre:
			<input type="text" name="nombre" value="" size="30"><br>
			Apellido:
			<input type="text" name="" value="" size="30"><br>
			Correo:
			<input type="text" name="" value="" size="30"><br>
			Fecha Nacimiento:
			<input type="text" name="" value="" size="30"><br>
			Nacionalidad:
			<select name="nacionalidad">
				<?php
					echo $comboPais;
				?>
			</select>
		</fieldset>

		<fieldset>
			<legend>Preferencias</legend>
			Estilo Musical:<br>
			<?php
				echo $radioMusica;
			?>
			Genero Cinematográfico:<br>
			<?php
				echo $checkBoxPeliculas;
			?>
		</fieldset>

		<br><br>
		<button type="submit" name="registrar" onclick="registrar()">  Registrar  <img src="images/save.png" alt="registrar"></button>
		<button type="reset" onclick="limpiar()">  Limpiar  <img src="images/delete.png" alt="limpiar"></button>

	</form>

</body>
</html>

