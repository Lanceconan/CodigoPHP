<?php

    /************************** RECEPCIÓN DE EVENTOS *************************************/

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
        $pass="pgmasterkey*.olimpo2017";
        $dbname="db_preferencia";
    
        $cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$pass";
    
        $connect = pg_connect("
            $cadenaConexion
        ") or die('No se ha podido conectar: ' . pg_last_error());
    
        return $connect;
    }

    /**
     * Metodo que contiene los que haceres para registrar una preferencia
     */
    function registrarPreferencia(){
        echo("Algo");
        $connect = getConection();
    }
?>