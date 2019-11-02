<?php
include("../modelo/persona.php");
include("../control/ctrPersona.php");
include("../control/ctrConexion.php");

$id="";
$Nombre="";
$Apellido="";
$tel="";
$email="";
$tipo="";

try{
$id=$_POST['txtID'];
$Nombre=$_POST['txtNOM'];
$Apellido=$_POST['txtAPELL'];
$tel=$_POST['txtTEL'];
$email=$_POST['txtEMAIL'];
$tipo=$_POST['txtTIPO'];

$boton=$_POST['boton']; 

if($boton=='Guardar'){
    $oPersona = new persona($id, $Nombre, $Apellido, $tel, $email, $tipo);
    $octrPersona = new ctrPersona($oPersona);
    $octrPersona->Guardar();
}
if($boton=='Consultar'){
    $oPersona = new persona($id, '', '', '', '', '');
    $octrPersona = new ctrPersona($oPersona);
    $oPersona = $octrPersona->Consultar();
    
    $id=$oPersona->getId();
    $Nombre=$oPersona->getNombre();
    $Apellido=$oPersona->getApell();
    $tel=$oPersona->getTel();
    $email=$oPersona->getEmail();
    $tipo=$oPersona->getTipo();
}
if($boton=='Modificar'){ 
    $oPersona = new persona($id, $Nombre, $Apellido, $tel, $email, $tipo);
    $octrPersona = new ctrPersona($oPersona);
    $octrPersona->Modificar();
}
if($boton=='Eliminar'){
    $oPersona = new persona($id, '', '', '', '', '');
    $octrPersona = new ctrPersona($oPersona);
    $octrPersona->Eliminar();
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
    <form  action=\"vphpPersona.php\" method=\"POST\">
        <div class=\"container register\">
            <div class=\"row\">
                <div class=\"col-md-3 register-left\">
                    <h3>Bienvenido!</h3>
                    <p><h1>PERSONAS</h1></p>
                </div>
                    <div class=\"col-md-9 register-right\">
                        <div class=\"tab-content\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                                <h3 class=\"register-heading\">Registro de personas</h3>
                                <div class=\"row register-form\">
                                    <div class=\"col-md-6\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Identificación *\" value=\"$id\" name=\"txtID\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Nombres *\" value=\"$Nombre\" name=\"txtNOM\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Apellidos *\" value=\"$Apellido\" name=\"txtAPELL\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Teléfono *\" value=\"$tel\" name=\"txtTEL\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Email \" value=\"$email\" name=\"txtEMAIL\"/>
                                        </div>
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control\" placeholder=\"Tipo *\" value=\"$tipo\" name=\"txtTIPO\"/>
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