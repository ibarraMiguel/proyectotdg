<?php
include("../modelo/estudiante.php");
include("../control/ctrEstudiante.php");
include("../control/ctrConexion.php");

$id_persona="";
$id_estudiante="";
$promedio="";

try{
$id_persona=$_POST['txtid_persona'];
$id_estudiante=$_POST['txtid_estudiante'];
$promedio=$_POST['txtProm'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oEstudiante = new estudiante($id_persona, $id_estudiante, $promedio);
    $octrEstudiante = new ctrEstudiante($oEstudiante);
    $octrEstudiante->Guardar();
}
if($boton=='Consultar'){
    $oEstudiante = new estudiante($id_persona, '', '');
    $octrEstudiante = new ctrEstudiante($oEstudiante);
    $oEstudiante = $octrEstudiante->Consultar();
    
    $id_persona=$oEstudiante->getId_persona();
    $id_estudiante=$oEstudiante->getId_estudiante();
    $promedio=$oEstudiante->getPromedio();
}
if($boton=='Modificar'){ 
    $oEstudiante = new estudiante($id_persona, $id_estudiante, $promedio);
    $octrEstudiante = new ctrEstudiante($oEstudiante);
    $octrEstudiante->Modificar();
}
if($boton=='Eliminar'){
    $oEstudiante = new estudiante($id_persona, '', '');
    $octrEstudiante = new ctrEstudiante($oEstudiante);
    $octrEstudiante->Eliminar();
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
    <form  action=\"vphpEstudiante.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>ESTUDIANTES</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" id_persona=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id_persona=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de Estudiantes</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Identificación *\" value=\"$id_persona\" name=\"txtid_persona\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"identificación de Estudiante *\" value=\"$id_estudiante\" name=\"txtid_estudiante\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Promedio *\" value=\"$promedio\" name=\"txtProm\"/>
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