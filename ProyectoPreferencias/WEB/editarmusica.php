<?php
    
    $host="localhost";
	$port="1680";
	$user="postgres";
	$pass="postgres";
	$dbname="db_preferencia";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
	$conexion = pg_connect($cadenaConexion) 
		or die('No se ha podido conectar: ' . pg_last_error());;
	
        $query = "SELECT mus_id, mus_nombre FROM pre_musica WHERE mus_id = ".$_GET["idMusica"].";";
        $result = pg_query($query);	
        
        while($row = pg_fetch_array($result))
        {	        
            $idMusica = $row['mus_id'];
            $nombreMusica = $row['mus_nombre'];
        }
    
        pg_close($conexion);		

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Estilo Musical</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="js/alertas.js"></script>
</head>
<body>
    <ul>
        <li><a href="index.php"> Responder Encuesta</a></li>
        <li><a href="pelicula.php"> Generos Cinematográfico</a></li>
        <li><a href="musica.php"> Estilos Musical</a></li>
    </ul>
        
    <h2> Editar el Estilo Musical: <?php echo "'".$nombreMusica."'" ?> </h2>

    <form action="controller/controller.php" method="post">
        <fieldset>
        <legend>Nuevo Nombre</legend>
            <input type="hidden" name="idMusica" value=<?php echo "'".$idMusica."'" ?> >           
            <input type="text" name="nombreMusica" value=<?php echo "'".$nombreMusica."'" ?>>
            <br><br>
            <button type="submit" name="editar_musica_ok"> Guardar <img src="images/save.png"></button>    
        </fieldset>
    </form>

</body>
</html>