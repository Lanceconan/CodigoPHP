<?php

    /************************** RECEPCIÓN DE EVENTOS *************************************/

    if(isset($_POST['insertar_musica'])){        
        insertarRegistroMusica(mb_strtoupper($_POST['musica']));
        header("refresh:0;url='../musica.php'");
    }

    if(isset($_POST['insertar_pelicula'])){        
        insertarRegistroPelicula(mb_strtoupper($_POST['pelicula']));
        header("refresh:0;url='../pelicula.php'");
    }

    if(isset($_POST['editar_musica'])){        
        header("location: ../editarmusica.php?idMusica=".$_POST['editar_musica']."") ; 
    }

    if(isset($_POST['editar_pelicula'])){     
        header("location: ../editarpelicula.php?idPelicula=".$_POST['editar_pelicula']."") ;
    }

    if(isset($_POST['editar_musica_ok'])){        
        updateRegistroMusical(mb_strtoupper($_POST['idMusica']), mb_strtoupper($_POST['nombreMusica']));
        header("refresh:0;url='../musica.php'");
    }

    if(isset($_POST['editar_pelicula_ok'])){        
        updateRegistroPelicula(mb_strtoupper($_POST['idPelicula']), mb_strtoupper($_POST['nombrePelicula']));
        header("refresh:0;url='../pelicula.php'");
    }

    if(isset($_POST['eliminar_musica'])){        
        deleteEstiloMusical($_POST['eliminar_musica']);        
        header("refresh:0;url='../musica.php'");
    }

    if(isset($_POST['eliminar_pelicula'])){
        deleteGeneroCinematográfico($_POST['eliminar_pelicula']);
        header("refresh:0;url='../pelicula.php'");
    }

    if(isset($_POST['registrar'])){
        registrarPreferencia();
    }

    /************************** FUNCIONES PRINCIPALES **************************************/
    
    /**
     * Metodoparaobtener la conexxión a la base de datos
     */
    function getConection(){        
        $host="localhost";
        $port="1680";
        $user="postgres";
        $pass="postgres";
        $dbname="db_preferencia";
    
        $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
    
        $conexion = pg_connect("
            $cadenaConexion
        ") or die('No se ha podido conectar: ' . pg_last_error());
    
        return $conexion;
    }

    /**
     * Metodo que contiene los que haceres para registrar una preferencia
     */
    function registrarPreferencia(){
        echo("Algo");
        $connect = getConection();        
    }

    /**
     * Metodo para eliminar un registro de estilo musical
     */
    function deleteEstiloMusical($idMusica){
        
        $connect = getConection();
        
        $query = "DELETE FROM pre_musica WHERE mus_id = ".$idMusica.";";
        $result = pg_query($query);
        
        pg_close($connect);
    }

    /**
     * Metodo para eliminar un registro de genero cinematográfico
     */
    function deleteGeneroCinematográfico($idGenero){
        
        $connect = getConection();
        
        $query = "DELETE FROM pre_pelicula WHERE pel_id = ".$idGenero.";";
        $result = pg_query($query);
        
        pg_close($connect);
    }

    /**
     * Metodo para insertar un nuevo registro de música
     */
    function insertarRegistroMusica($musica){
        
        $conexion = getConection();

        $query = "INSERT INTO pre_musica (mus_id, mus_nombre) 
                    VALUES ((SELECT MAX(mus_id)+1 FROM pre_musica), '".$musica."');";
        $result = pg_query($query);

        pg_close($conexion);
    }

    /**
     * Metodo para insertar un nuevo registro en términos de peliculas
     */
    function insertarRegistroPelicula($pelicula){

        $conexion = getConection();

        $query = "INSERT INTO pre_pelicula (pel_id, pel_nombre) 
        VALUES ((SELECT MAX(pel_id)+1 FROM pre_pelicula), '".$pelicula."');";

        $result = pg_query($query);

        pg_close($conexion);
    }

    function updateRegistroMusical($idMusica, $nombreMusica){
        
        $conexion = getConection();
        
        $query = "UPDATE pre_musica SET mus_nombre = '".$nombreMusica."' WHERE mus_id = ".$idMusica.";";
        $result = pg_query($query);

        pg_close($conexion);
    }
    

    function updateRegistroPelicula($idPelicula, $nombrePelicula){
        $conexion = getConection();
        
        $query = "UPDATE pre_pelicula SET pel_nombre = '".$nombrePelicula."' WHERE pel_id = ".$idPelicula.";";
        $result = pg_query($query);

        pg_close($conexion);
    }

?>