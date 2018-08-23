<?
    $$host="localhost";
	$port="1680";
	$user="postgres";
	$pass="pgmasterkey*.olimpo2017";
	$dbname="db_preferencia";

	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
	$conexion = pg_connect($cadenaConexion) 
        or die('No se ha podido conectar: ' . pg_last_error());
    
    $query = "SELECT mus_nombre as nombre, count(uxm_id) as cantidad FROM pre_usuariomusica JOIN pre_musica ON uxm_mus_id = mus_id GROUP BY mus_nombre;";

    $result=pg_query($query);

    while($row = pg_fetch_array($result))
    {	        
        $idMusica = $row['nombre'];
        $nombreMusica = $row['cantidad'];
    }

    $query = "SELECT pel_nombre as nombre, count(uxp_id) as cantidad FROM pre_usuariopelicula JOIN pre_pelicula ON uxp_pel_id = pel_id GROUP BY pel_nombre;";

    $result=pg_query($query);

    while($row = pg_fetch_array($result))
    {	        
        $idPelicula = $row['nombre'];
        $nombrePelicula = $row['cantidad'];
    }


    
    pg_close($conexion);		

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Resultados Encuesta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="js/grafico.js"></script>   
    
</head>
<body>
    <ul>
        <li><a href="index.php"> Responder Encuesta</a></li>
        <li><a href="pelicula.php"> Generos Cinematográfico</a></li>
        <li><a href="musica.php"> Estilos Musical</a></li>
        <li><a href="estadisticas.php"> Resultados</a></li>
    </ul>
    
    <div id="donutchartmusica" style="width: 900px; height: 500px;">11111111</div>
    <div id="donutchartpeliculas" style="width: 900px; height: 500px;">222222</div>

    <form action="controller/controller.php" method="post">
            Nuevo Estilo:<input type="text" name="musica">
            <br><br>
            <button type="submit" name="insertar_musica"><img src="images/save.png" alt="guardar">Guardar</button>
            <button type="reset" onclick="mostrarPHP()"><img src="images/delete.png" alt="guardar">Borrar</button>
        </form>

</body>
</html>