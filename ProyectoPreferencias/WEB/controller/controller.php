<?php

    /************************** RECEPCIÓN DE EVENTOS *************************************/

    if(isset($_POST['registrar'])){
        registrarPreferencia();
    }

    if(isset($_POST['editar_musica'])){
        echo("evento de editar genero musical ID: ".$_POST['editar_musica']);
    }

    if(isset($_POST['eliminar_musica'])){
        echo("evento de eliminar genero musical con ID: ".$_POST['eliminar_musica']);
    }

    if(isset($_POST['editar_pelicula'])){
        echo("evento de editar pelicula con ID: ".$_POST['editar_pelicula']);
    }

    if(isset($_POST['eliminar_pelicula'])){
        echo("evento de eliminar pelicula con ID: ".$_POST['eliminar_pelicula']);
    }

    /************************** FUNCIONES PRINCIPALES **************************************/
    
    /**
     * Metodoparaobtener la conexxión a la base de datos
     */
    function getConection(){        
        $host="localhost";
        $port="1680";
        $user="postgres";
        $pass="pgmasterkey*.olimpo2017";
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
?>