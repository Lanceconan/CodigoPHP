<?php include("header.php"); ?>

<div id="page-wrapper" >            
    <div id="page-inner">     
        <div class="row">                
            <div class="col-md-12">
                <div class="jumbotron">
                    <center>
                    	<h1>Mensajes Encontrados</h1> 
                    </center>                    
                    
                    <p>
                        <?php
                            //require_once('lib/nusoap.php');
                            $wsdl = "http://sebastian.cl/isw-ws/wsISW?wsdl";

                            $parametro = array();
                            $parametro['rut'] = $_POST['rut'];
                            $cliente = new SoapClient($wsdl);
                            $resultado = $cliente->getAccesosPorRut($parametro);

                            echo "<pre>";
                            print_r($resultado);
                            echo "</pre>";
                        ?>
                    </p>                    
                </div>
            </div>
        </div>          
    </div>
</div>

<?php include("footer.php"); ?>