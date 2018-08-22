<?php

    /************************** RECEPCIÓN DE EVENTOS *************************************/

    if(isset($_POST['registrar'])){
        registrarPreferencia();
    }

    if(isset($_POST['editar_musica'])){
        echo("evento de editar genero musical ID: ".$_POST['editar_musica']);
    }

    if(isset($_POST['editar_musica_ok'])){
        echo("evento de editar genero musical ID: ".$_POST['editar_musica_ok']);
    }

    if(isset($_POST['editar_pelicula'])){
        echo("evento de editar pelicula con ID: ".$_POST['editar_pelicula']);
    }

    if(isset($_POST['eliminar_musica'])){        
        eliminarEstiloMusical($_POST['eliminar_musica']);        
        header("refresh:0;url='../musica.php'");

    }

    if(isset($_POST['eliminar_pelicula'])){
        eliminarGeneroCinematográfico($_POST['eliminar_pelicula']);
        header("refresh:0;url='../pelicula.php'");
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
    function eliminarEstiloMusical($idEstilo){
        
        $connect = getConection();
        
        $query = "DELETE FROM pre_musica WHERE mus_id = ".$idEstilo.";";
        $result = pg_query($query);
        
        pg_close($connect);
    }

    /**
     * Metodo para eliminar un registro de genero cinematográfico
     */
    function eliminarGeneroCinematográfico($idGenero){
        
        $connect = getConection();
        
        $query = "DELETE FROM pre_pelicula WHERE pel_id = ".$idGenero.";";
        $result = pg_query($query);
        
        pg_close($connect);
    }
?>