<?php include("header.php"); ?>

<div id="page-wrapper" >            
    <div id="page-inner">     
        <div class="row">                
            <div class="col-md-12">
                <div class="jumbotron">
                    <center>
                    <h1>Consulte los Mensajes segun RUT</h1>                  
                    </center>
                </div>
            </div>
        </div>
        <div class="row">      
        <center>
        <div class="col-md-12 col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Mensajes
                </div>
                <div class="panel-body">                     
                    <form method="post" action="investigarMensajes.php">               
                                                
                        <label>Inserte el rut para buscar si registra acceso(s)</label> <br><br>
                        <input type="text" name="rut" required></input>                        
                        <br><br><br>
                        <input type="submit" value="Consultar" class="btn btn-success btn-lg"></input>
                        <input class="btn btn-danger btn-lg" type="reset" value="Borrar">                                
                    </form>
                                        
                </div>
                <div class="panel-footer">
                    ISW - UTEM 2014
                </div>
            </div>
        </div>
        </center>
        </div>        
</div>

<?php include("footer.php"); ?>