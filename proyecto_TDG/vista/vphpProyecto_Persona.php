<?php
include("../modelo/proyecto_persona.php");
include("../control/ctrProyecto_Persona.php");
include("../control/ctrConexion.php");

$id_proyecto="";
$id_persona="";
$rol="";

try{
$id_proyecto=$_POST['txtIDP'];
$id_persona=$_POST['txtIDE'];
$rol=$_POST['txtROL'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oProyecto_Persona = new proyecto_persona($id_proyecto, $id_persona, $rol);
    $ctrProyecto_persona = new ctrProyecto_Persona($oProyecto_Persona);
    $ctrProyecto_persona->Guardar();
}
if($boton=='Consultar'){
    $oProyecto_Persona = new proyecto_persona($id_proyecto, '', '');
    $ctrProyecto_persona = new ctrProyecto_Persona($oProyecto_Persona);
    $oProyecto_Persona = $ctrProyecto_persona->Consultar();
    
    $id_proyecto=$oProyecto_Persona->getIDP();
    $id_persona=$oProyecto_Persona->getIDE();
    $rol=$oProyecto_Persona->getROL();
}
if($boton=='Modificar'){ 
    $oProyecto_Persona = new proyecto_persona($id_proyecto, $id_persona, $rol);
    $ctrProyecto_persona = new ctrProyecto_Persona($oProyecto_Persona);
    $ctrProyecto_persona->Modificar();
}
if($boton=='Eliminar'){
    $oProyecto_Persona = new proyecto_persona($id_proyecto, '', '');
    $ctrProyecto_persona = new ctrProyecto_Persona($oProyecto_Persona);
    $ctrProyecto_persona->Eliminar();
}


echo("<!DOCTYPE html>
<html lang=\"es\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"wid_personath=device-wid_personath, initial-scale=1.0\">    
    <link rel=\"stylesheet\" type=\"text/css\" href=\"zEstilos.css\">
    <link href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\" rel=\"stylesheet\" id_persona=\"bootstrap-css\">
    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
</head>
<body>
    <form  action=\"vphpProyecto_Persona.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>PROYECTOS DE PERSONAS</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" id_persona=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id_persona=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Proyectos de Personas</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Identificación del Proyecto*\" value=\"$id_proyecto\" name=\"txtIDP\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"identificación de la Persona *\" value=\"$id_persona\" name=\"txtIDE\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Rol *\" value=\"$rol\" name=\"txtROL\"/>
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