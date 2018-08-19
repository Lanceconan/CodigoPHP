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
                            $resultado = $cliente->getMensajePorRut($parametro);

                            /*
                            echo "<pre>";
                            print_r($resultado);
                            echo "</pre>";
                             * 
                             */
                        ?>
                    </p>                    
                </div>
                <?php                
                if($resultado->estadoSalida->codigo==-1){
                    ?>
                    <div class="jumbotron">
                        No existen Mensajes registrados con el Rut Ingresado o Rut Invalido.
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="jumbotron">
                        <div class="form-group">
                            <label>Id</label>
                            <input class="form-control" type="text" readonly="true" value=<?php echo $resultado->return->id ?>>
                            <label>Rut</label>
                            <input class="form-control" type="text" readonly="true" value=<?php echo $resultado->return->rut ?>>
                            <label>Accion</label>
                            <input class="form-control" type="text" readonly="true" value=<?php echo $resultado->return->mensaje?>>
                            <label>Fecha</label>
                            <input class="form-control" type="text" readonly="true" value=<?php echo $resultado->return->fecha ?>>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>          
    </div>
</div>

<?php include("footer.php"); ?>