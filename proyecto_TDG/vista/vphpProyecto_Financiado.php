<?php
include("../modelo/proyecto_financiado.php");
include("../control/ctrProyecto_Financiado.php");
include("../control/ctrConexion.php");

$IDP="";
$IDF="";
$FE="";
$POR="";

try{
$IDP=$_POST['txtIDP'];
$IDF=$_POST['txtIDF'];
$FE=$_POST['txtFE'];
$POR=$_POST['txtPOR'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oProyecto_Financiado = new proyecto_financiado($IDP, $IDF, $FE, $POR);
    $octrProyecto_Financiado = new ctrProyecto_Financiado($oProyecto_Financiado);
    $octrProyecto_Financiado->Guardar();
}
if($boton=='Consultar'){
    $oProyecto_Financiado = new proyecto_financiado($IDP, '', '', 0);
    $octrProyecto_Financiado = new ctrProyecto_Financiado($oProyecto_Financiado);
    $oProyecto_Financiado = $octrProyecto_Financiado->Consultar();
    
    $IDP=$oProyecto_Financiado->getIDP();
    $IDF=$oProyecto_Financiado->getIDF();
    $FE=$oProyecto_Financiado->getFE();
    $POR=$oProyecto_Financiado->getPOR();
}
if($boton=='Modificar'){ 
    $oProyecto_Financiado = new proyecto_financiado($IDP, $IDF, $FE, $POR);
    $octrProyecto_Financiado = new ctrProyecto_Financiado($oProyecto_Financiado);
    $octrProyecto_Financiado->Modificar();
}
if($boton=='Eliminar'){
    $oProyecto_Financiado = new proyecto_financiado($IDP, '', '', 0);
    $octrProyecto_Financiado = new ctrProyecto_Financiado($oProyecto_Financiado);
    $octrProyecto_Financiado->Eliminar();
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
    <form  action=\"vphpProyecto_Financiado.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>FINANCIACIÓN DE PROYECTOS</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Financiación de Proyectos</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"ID Proyecto *\" value=\"$IDP\" name=\"txtIDP\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"ID Financiador *\" value=\"$IDF\" name=\"txtIDF\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Fecha \" value=\"$FE\" name=\"txtFE\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Porcentaje *\" value=\"$POR\" name=\"txtPOR\"/>
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