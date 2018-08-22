<?php
				
	$host="localhost";
	$port="1680";
	$user="postgres";
	$pass="pgmasterkey*.olimpo2017";
	$dbname="db_preferencia";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
	$conexion = pg_connect($cadenaConexion) 
		or die('No se ha podido conectar: ' . pg_last_error());;
	
	$query = "SELECT mus_id, mus_nombre FROM pre_musica";
	$result = pg_query($query);	
    
    $tablaMusica="";
	
	while($row = pg_fetch_array($result))
	{	        
        $tablaMusica .= "<tr><td>".$row['mus_id']."</td><td>".$row['mus_nombre']."</td>
        <td>
            <button type='submit' name='editar_musica' value='".$row['mus_id']."'><img src='images/edit.png' alt='guardar'>Editar</button>
            <button type='submit' name='eliminar_musica' value='".$row['mus_id']."'><img src='images/borrar.png' alt='guardar'>Eliminar</button>
        </td></tr>";
	}

	pg_close($conexion);	
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Estilos Musicales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script type="text/javascript" src="js/alertas.js"></script>
</head>
<body>

    <ul>
		<li><a href="index.php"> Responder Encuesta</a></li>
		<li><a href="pelicula.php"> Generos Cinematográfico</a></li>
		<li><a href="musica.php"> Estilos Musical</a></li>
	</ul>

    <h2>Generos Musicales Actuales</h2>

    <form action="controller/controller.php" method="post">
        <fieldset>
            <legend>Registros Actuales en Sistema </legend>
            
            <table border="1">
            <tr>
                <th>ID</th><th>Genero Musical</th><th>Acciones</th>
            </tr>
            
            <?php
                echo $tablaMusica;
            ?>
        </table>
        </fieldset>
    </form>
    
    <fieldset>
        <legend>Agregar Nuevo Registro</legend>
        <br>
        <form action="controller/controller.php" method="post">
            Nuevo Estilo:<input type="text" name="musica">
            <br><br>
            <button type="submit" name="insertar_musica"><img src="images/save.png" alt="guardar">Guardar</button>
            <button type="reset" onclick="limpiar()"><img src="images/delete.png" alt="guardar">Borrar</button>
        </form>

    </fieldset>
</body>
</html>