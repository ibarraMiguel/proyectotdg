<?php
include("../modelo/usuario_sesion.php");
include("../control/ctrUsuario_sesion.php");
include("../control/ctrConexion.php");

$ID="";
$PRI="";
$USER="";
$PASS="";

try{
$ID=$_POST['txtID'];
$PRI=$_POST['txtPRI'];
$USER=$_POST['txtUSER'];
$PASS=$_POST['txtPASS'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oUsuario_Sesion = new usuario_sesion($ID, $PRI, $USER, $PASS);
    $octrUsuario_Sesion = new ctrUsuario_sesion($oUsuario_Sesion);
    $octrUsuario_Sesion->Guardar();
}
if($boton=='Consultar'){
    $oUsuario_Sesion = new usuario_sesion($ID, '', '', '');
    $octrUsuario_Sesion = new ctrUsuario_sesion($oUsuario_Sesion);
    $oUsuario_Sesion = $octrUsuario_Sesion->Consultar();
    
    $ID=$oUsuario_Sesion->getID();
    $PRI=$oUsuario_Sesion->getPRI();
    $USER=$oUsuario_Sesion->getUSER();
    $PASS=$oUsuario_Sesion->getPASS();
}
if($boton=='Modificar'){ 
    $oUsuario_Sesion = new usuario_sesion($ID, $PRI, $USER, $PASS);
    $octrUsuario_Sesion = new ctrUsuario_sesion($oUsuario_Sesion);
    $octrUsuario_Sesion->Modificar();
}
if($boton=='Eliminar'){
    $oUsuario_Sesion = new usuario_sesion($ID, '', '', '');
    $octrUsuario_Sesion = new ctrUsuario_sesion($oUsuario_Sesion);
    $octrUsuario_Sesion->Eliminar();
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
    <form  action=\"vphpUsuario_Sesion.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>BienvenIDo!</h3>
                    <p><h1>SESIÓN DE USUARIOS</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" ID=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" ID=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Sesiones de Usuarios</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Identificación *\" value=\"$ID\" name=\"txtID\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Privilegios *\" value=\"$PRI\" name=\"txtPRI\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Usuario *\" value=\"$USER\" name=\"txtUSER\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Clave *\" value=\"$PASS\" name=\"txtPASS\"/>
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