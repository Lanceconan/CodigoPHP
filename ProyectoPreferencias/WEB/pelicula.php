<?php
				
	$host="localhost";
	$port="1680";
	$user="postgres";
	$pass="postgres";
	$dbname="db_preferencia";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
	$cnx = pg_connect($cadenaConexion) 
		or die('No se ha podido conectar: ' . pg_last_error());;
	
	$query = "SELECT pel_id, pel_nombre FROM pre_pelicula";
	$result = pg_query($query);	
    
    $tablaPelicula="";
	
	while($row = pg_fetch_array($result))
	{	        
        $tablaPelicula .= "<tr><td>".$row['pel_id']."</td><td>".$row['pel_nombre']."</td>
        <td><button type='submit'><img src='images/edit.png' alt='guardar'>Editar</button></td>
        <td><button type='submit'><img src='images/borrar.png' alt='guardar'>Eliminar</button></td>
        </tr>";
	}

	pg_close($cnx);	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Géneros Cinematográficos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

    <ul>
		<li><a href="index.php"> Responder Encuesta</a></li>
		<li><a href="pelicula.php"> Generos Cinematográfico</a></li>
		<li><a href="musica.php"> Estilos Musical</a></li>
	</ul>

    <h2>Generos Cinematográficos Actuales</h2>

    <fieldset>
        <legend>Registros Actuales en Sistema </legend>
        
        <table border="1">
        <tr>
            <th>ID</th><th>Género Cinematográfico</th><th>Acciones</th>
        </tr>
        
        <?php
            echo $tablaPelicula;
        ?>
    </table>
    </fieldset>

    <fieldset>
        <legend>Agregar Nuevo Registro</legend>
        <br>
        <form action="controller/controller.php" method="post">
            Nuevo Género:<input type="text" name="pelicula">
            <br><br>
            <button type="submit"><img src="images/save.png" alt="guardar">Guardar</button>
            <button type="reset" onclick="limpiar()"><img src="images/delete.png" alt="guardar">Borrar</button>
        </form>

    </fieldset>

    </body>
</html>