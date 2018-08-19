<?php include("header.php"); ?>

<div id="page-wrapper" >            
    <div id="page-inner">     
        <div class="row">                
            <div class="col-md-12">
                <div class="jumbotron">
                    <center>
                    <h1>Mensaje Enviado</h1>                     
                        <p>
                        	<?php
								require_once('lib/nusoap.php');
								$wsdl = "http://sebastian.cl/isw-ws/wsISW?wsdl";

								$parametros = array();
								$parametros['rut'] = $_POST['rut'];
								$parametros['mensaje'] = $_POST['message'];
								$cliente = new SoapClient($wsdl);
								$resultado = $cliente->guardarMensaje($parametros);

								$response = $resultado->return;

								echo "<pre>";
								print_r($response);
								echo "</pre>";
							?>
                        </p>
                    </center>
                </div>
            </div>
        </div>
        <center>
        <div class="row">  
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Opciones
                </div>
                <div class="panel-body">
                    <a href="mandar_mensaje.php" class="btn btn-success btn-lg">Escribir Nuevo Mensaje</a>
                 </div>
                <div class="panel-footer">
                    ISW - UTEM 2014
                </div>
            </div>
        </div>        
        </div>
        </center>     
    </div>
</div>

<?php include("footer.php"); ?>