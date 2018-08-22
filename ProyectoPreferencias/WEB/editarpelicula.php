<?php
   
    $host="localhost";
	$port="1680";
	$user="postgres";
	$pass="pgmasterkey*.olimpo2017";
	$dbname="db_preferencia";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
	$conexion = pg_connect($cadenaConexion) 
		or die('No se ha podido conectar: ' . pg_last_error());;
	
	$query = "SELECT pel_id, pel_nombre FROM pre_pelicula WHERE pel_id = ".$_GET["idPelicula"].";";
	$result = pg_query($query);	
	
	while($row = pg_fetch_array($result))
	{	        
        $idPelicula = $row['pel_id'];
        $nombrePelicula = $row['pel_nombre'];
	}

	pg_close($conexion);	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Género Cinematográfico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <ul>
        <li><a href="index.php"> Responder Encuesta</a></li>
        <li><a href="pelicula.php"> Generos Cinematográfico</a></li>
        <li><a href="musica.php"> Estilos Musical</a></li>
        <li><a href="estadisticas.php"> Resultados</a></li>
    </ul>
    
    <h2> Editar el Género Cinematográfico: <?php echo "'".$nombrePelicula."'" ?> </h2>

    <form action="controller/controller.php" method="post">
        <fieldset>
            <legend>Nuevo Nombre</legend>
            <input type="hidden" name="idPelicula" value=<?php echo "'".$idPelicula."'" ?>>            
            <input type="text" name="nombrePelicula" value=<?php echo "'".$nombrePelicula."'" ?>>
            <br><br>
            <button type="submit" name="editar_pelicula_ok"> Guardar <img src="images/save.png"></button>    
        </fieldset>
    </form>
</body>
</html>