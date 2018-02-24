<?php
 
if(isset($_POST['create'])){
    createRegister();
}

if(isset($_POST['read'])){
    readAllRegister();
}


function createRegister(){
    
    $connect = getConection();
    
    //SE OBTIENE EL TEXTO DEL FORMULARIO
    $COMUNA = $_POST['comuna'];
    
    //OBTENER EL MAYOR ID Y LA ID DE LA CIUDAD
    $query = 'SELECT MAX(com_id), MAX(com_ciu_id) FROM tcc_comuna';
    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

    while ($row = pg_fetch_row($result)) {
        $ID = $row[0];
        $CIU = $row[1];
    }

    $ID = $ID + 1;

    
    pg_free_result($result);

    // Realizando la insersión
    $query = "INSERT INTO tcc_comuna (com_id, com_nomcomuna, com_ciu_id) VALUES ($ID, '$COMUNA', $CIU)";
    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

    echo "<br><br>Nueva ID: $ID  Comuna: $COMUNA IDCiudad: $CIU";

    // Liberando el conjunto de resultados
    pg_free_result($result);

    // Cerrando la conexión
    pg_close($connect);

    echo "<h3><p><a href = 'index.php'>IR AL MENU</a></p></h3>";
}

function readAllRegister(){
    
    $connect = getConection();
    echo "<h3>Conexion Exitosa PHP - PostgreSQL</h3><hr><br>";

    // Realizando una consulta SQL
    $query = 'SELECT * FROM tcc_comuna';
    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

    // Imprimiendo los resultados en HTML
    echo "
        <table border='1' align='center'>
        <tr bgcolor='skyblue'>
            <th>ID</th>
            <th>COMUNA</th>
            <th>IDCIUDAD</th>
        </tr>
        ";

    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";

    // Liberando el conjunto de resultados
    pg_free_result($result);

    // Cerrando la conexión
    pg_close($connect);

    echo "<h3><p><a href = 'index.php'>IR AL MENU</a></p></h3>";
}

function getConection(){
    // Conectando y seleccionado la base de datos
    $host="localhost";
    $port="1680";
    $user="postgres";
    $pass="pgmasterkey*.olimpo2017";
    $dbname="db_olimpo_prueba";

    $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";

    $connect = pg_connect("
        $cadenaConexion
    ") or die('No se ha podido conectar: ' . pg_last_error());

    return $connect;
}


?>