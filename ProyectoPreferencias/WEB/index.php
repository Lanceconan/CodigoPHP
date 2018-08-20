<?php
				
	$host="localhost";
	$port="1680";
	$user="postgres";
	$pass="pgmasterkey*.olimpo2017";
	$dbname="db_preferencia";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
	$cnx = pg_connect($cadenaConexion) or die('No se ha podido conectar: ' . pg_last_error());;
	$query = "SELECT pai_id, pai_nombre FROM pre_pais";
	$result = pg_query($query);
	
	if ( $result == FALSE)
		die("No se conecta, no funka, se hace alguna weaita mal :-)");
			
	$num_registros = pg_num_rows($result);

	if($num_registros <= 0)
		echo ("Resultados" + $num_registros);
	
	$combobit="";
	
	while($row=pg_fetch_array($result))
	{		
		$combobit .=" <option value='".$row['pai_id']."'>".$row['pai_nombre']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
	}

	//$cnx->close();	
?>	

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
			<?php
				echo $combobit;
			?>
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