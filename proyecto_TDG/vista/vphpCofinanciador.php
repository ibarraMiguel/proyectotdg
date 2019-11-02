<?php
include("../modelo/cofinanciador.php");
include("../control/ctrCofinanciador.php");
include("../control/ctrConexion.php");

$ID="";
$NOM="";
$TEL="";
$COR="";

try{
$ID=$_POST['txtID'];
$NOM=$_POST['txtNOM'];
$TEL=$_POST['txtTEL'];
$COR=$_POST['txtCOR'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oCofinanciador = new cofinanciador($ID, $NOM, $TEL, $COR);
    $octrCofinanciador = new ctrCofinanciador($oCofinanciador);
    $octrCofinanciador->Guardar();
}
if($boton=='Consultar'){
    $oCofinanciador = new cofinanciador($ID, '', '', '');
    $octrCofinanciador = new ctrCofinanciador($oCofinanciador);
    $oCofinanciador = $octrCofinanciador->Consultar();
    
    $ID=$oCofinanciador->getID();
    $NOM=$oCofinanciador->getNOM();
    $TEL=$oCofinanciador->getTEL();
    $COR=$oCofinanciador->getCOR();
}
if($boton=='Modificar'){ 
    $oCofinanciador = new cofinanciador($ID, $NOM, $TEL, $COR);
    $octrCofinanciador = new ctrCofinanciador($oCofinanciador);
    $octrCofinanciador->Modificar();
}
if($boton=='Eliminar'){
    $oCofinanciador = new cofinanciador($ID, '', '', '');
    $octrCofinanciador = new ctrCofinanciador($oCofinanciador);
    $octrCofinanciador->Eliminar();
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
    <form  action=\"vphpCofinanciador.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>COFINACIACIÓN</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Cofinanciador</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Identificación *\" value=\"$ID\" name=\"txtID\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Nombre \" value=\"$NOM\" name=\"txtNOM\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Telefono \" value=\"$TEL\" name=\"txtTEL\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Correo \" value=\"$COR\" name=\"txtCOR\"/>
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