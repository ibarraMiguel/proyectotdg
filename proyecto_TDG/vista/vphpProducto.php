<?php
include("../modelo/producto.php");
include("../control/ctrProducto.php");
include("../control/ctrConexion.php");

$ID="";
$IDEP="";
$FE="";
$CAT="";

try{
$ID=$_POST['txtID'];
$IDEP=$_POST['txtIDEP'];
$FE=$_POST['txtFE'];
$CAT=$_POST['txtCAT'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oProducto = new producto($ID, $IDEP, $FE, $CAT);
    $octrProducto = new ctrProducto($oProducto);
    $octrProducto->Guardar();
}
if($boton=='Consultar'){
    $oProducto = new producto($ID, '', '', '');
    $octrProducto = new ctrProducto($oProducto);
    $oProducto = $octrProducto->Consultar();
    
    $ID=$oProducto->getID();
    $IDEP=$oProducto->getIDEP();
    $FE=$oProducto->getFE();
    $CAT=$oProducto->getCAT();
}
if($boton=='Modificar'){ 
    $oProducto = new producto($ID, $IDEP, $FE, $CAT);
    $octrProducto = new ctrProducto($oProducto);
    $octrProducto->Modificar();
}
if($boton=='Eliminar'){
    $oProducto = new producto($ID, '', '', '');
    $octrProducto = new ctrProducto($oProducto);
    $octrProducto->Eliminar();
}


echo("<!DOCTYPE html>
<html lang=\"es\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">    
    <link rel=\"stylesheet\" type=\"text/css\" href=\"zEstilos.css\">
    <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
</head>
<body>
    <form  action=\"vphpProducto.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>PRODUCTOS</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Productos</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Identificación *\" value=\"$ID\" name=\"txtID\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"ID Proyecto *\" value=\"$IDEP\" name=\"txtIDEP\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Fecha \" value=\"$FE\" name=\"txtFE\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Categoria *\" value=\"$CAT\" name=\"txtCAT\"/>
                                        </div>
                                    </div>
                                    <div class=\"col-md-6\">                                    
                                                                               
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Consultar\"/>
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Guardar\"/>
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Eliminar\"/>
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Modificar\"/>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
");

}
catch (Exception $e){
    echo "!ERROR¡:".$exp->getMessage()."\n";
}

?>