<?php
include("../modelo/asesoria.php");
include("../control/ctrAsesoria.php");
include("../control/ctrConexion.php");

$ID="";
$IDPR="";
$IDPE="";
$FECHA="";
$ASE="";

try{
$ID=$_POST['txtID'];
$IDPR=$_POST['txtIDPR'];
$IDPE=$_POST['txtIDPE'];
$FECHA=$_POST['txtFE'];
$ASE=$_POST['txtASE'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oAsesoria = new asesoria($ID, $IDPR, $IDPE, $FECHA, $ASE);
    $octrAsesoria = new ctrAsesoria($oAsesoria);
    $octrAsesoria->Guardar();
}
if($boton=='Consultar'){
    $oAsesoria = new asesoria($ID, '', '', '', '');
    $octrAsesoria = new ctrAsesoria($oAsesoria);
    $oAsesoria = $octrAsesoria->Consultar();
    
    $ID=$oAsesoria->getID();
    $IDPR=$oAsesoria->getIDPR();
    $IDPE=$oAsesoria->getIDPE();
    $FECHA=$oAsesoria->getFECHA();
    $ASE=$oAsesoria->getASE();
}
if($boton=='Modificar'){ 
    $oAsesoria = new asesoria($ID, $IDPR, $IDPE, $FECHA, $ASE);
    $octrAsesoria = new ctrAsesoria($oAsesoria);
    $octrAsesoria->Modificar();
}
if($boton=='Eliminar'){
    $oAsesoria = new asesoria($ID, '', '', '', '');
    $octrAsesoria = new ctrAsesoria($oAsesoria);
    $octrAsesoria->Eliminar();
}


echo("<!DOCTYPE html>
<html lang=\"es\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"wIDth=device-wIDth, initial-scale=1.0\">    
    <link rel=\"stylesheet\" type=\"text/css\" href=\"zEstilos.css\">
    <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" ID=\"bootstrap-css\">
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
</head>
<body>
    <form  action=\"vphpAsesoria.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>ASESORIAS</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" ID=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" ID=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Asesorias</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"IDentificación *\" value=\"$ID\" name=\"txtID\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"ID Proyecto *\" value=\"$IDPR\" name=\"txtIDPR\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"ID Persona *\" value=\"$IDPE\" name=\"txtIDPE\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Fecha *\" value=\"$FECHA\" name=\"txtFE\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Asesoria \" value=\"$ASE\" name=\"txtASE\"/>
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