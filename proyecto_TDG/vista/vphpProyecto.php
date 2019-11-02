<?php
include("../modelo/proyecto.php");
include("../control/ctrProyecto.php");
include("../control/ctrConexion.php");

$id="";
$tit="";
$FIns="";
$FI="";
$FF="";
$COF="";
$PRE="";
$PCO="";
$EST="";
$OBS="";
$TIPR="";

$boton=$_POST['boton'];

try{
    
$id=$_POST['txtID'];
$tit=$_POST['txtTIT'];
$FIns=$_POST['txtFINS'];
$FI=$_POST['txtFI'];
$FF=$_POST['txtFF'];
$COF=$_POST['txtCOF'];
$PRE=$_POST['txtPRE'];
$PCO=$_POST['txtPCO'];
$EST=$_POST['txtEST'];
$OBS=$_POST['txtOBS'];
$TIPR=$_POST['txtTIPR'];

$boton=$_POST['boton'];

if($boton=='Guardar'){ 
    $oProyecto = new proyecto($id, $tit, $FIns, $FI, $FF, $COF, $PRE, $PCO, $EST, $OBS, $TIPR);
    $octrProyecto = new ctrProyecto($oProyecto);
    $octrProyecto->Guardar();
}
if($boton=='Consultar'){
    $oProyecto = new proyecto($id, $tit, '', '', '', 0, 0, 0, '', '', '');
    $octrProyecto = new ctrProyecto($oProyecto);
    $oProyecto = $octrProyecto->Consultar();
    
    $id=$oProyecto->getId();
    $tit=$oProyecto->getTitulo();
    $FIns=$oProyecto->getfechaInisc();
    $FI=$oProyecto->getfechaIni();
    $FF=$oProyecto->getFechaFin();
    $COF=$oProyecto->getCofinanciado();
    $PRE=$oProyecto->getPresupuesto();
    $PCO=$oProyecto->getporcCofinanciado();
    $EST=$oProyecto->getEstado();
    $OBS=$oProyecto->getObservaciones();
    $TIPR=$oProyecto->getTipoProyecto(); 
}
if($boton=='Modificar'){
    $oProyecto = new proyecto($id, $tit, $FIns, $FI, $FF, $COF, $PRE, $PCO, $EST, $OBS, $TIPR);
    $octrProyecto = new ctrProyecto($oProyecto);
    $octrProyecto->Modificar();
}
if($boton=='Eliminar'){
    $oProyecto = new proyecto($id, $tit, '', '', '', 0, 0, 0, '', '', '');
    $octrProyecto = new ctrProyecto($oProyecto);
    $octrProyecto->Eliminar();
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
    <form  action=\"vphpProyecto.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>PROYECTOS</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Proyectos</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Identificación *\" value=\"$id\" name=\"txtID\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Título *\" value=\"$tit\" name=\"txtTIT\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Fecha de Inscripción *\" value=\"$FIns\" name=\"txtFINS\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Fecha de Inicio \" value=\"$FI\" name=\"txtFI\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Fecha de Finalización \" value=\"$FF\" name=\"txtFF\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Cofinanciado *\" value=\"$COF\" name=\"txtCOF\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Presupuesto \" value=\"$PRE\" name=\"txtPRE\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\"  placeholder=\"Porcentaje de Cofinanciación \" value=\"$PCO\" name=\"txtPCO\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\"  placeholder=\"Estado *\" value=\"$EST\" name=\"txtEST\"/>
                                        </div>
                                        <div class=\"form-group\">
                                         
                                    </div>
                                    <div class=\"form-group\">
                                            
                                    </div>
                                    </div>
                                    <div class=\"col-md-6\">
                                    <div class=\"form-group\">
                                        <textarea type=\"text\" class=\"form-control\"  placeholder=\"Observaciones \"  rows=\"10\" cols=\"50\" value=\"\" name=\"txtOBS\">$OBS</textarea>
                                    </div>
                                    <div class=\"form-group\">
                                        <input type=\"text\" class=\"form-control\"  placeholder=\"Tipo de Proyecto *\"value=\"$TIPR\" name=\"txtTIPR\"/>
                                    </div>
                                                                               
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Consultar\"/>
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Guardar\"/>
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Eliminar\"/>
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Modificar\"/>
                                    <input type=\"submit\" class=\"btnRegister\" name=\"boton\" value=\"Limpiar\" onclick=\"Limpiar()\"/>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <script src=\"funciones.js\"></script>
    </form>
</body>
</html>
");

}
catch (Exception $e){
    echo "!ERROR¡:".$exp->getMessage()."\n";
}

?>