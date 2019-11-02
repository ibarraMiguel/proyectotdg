<?php
class ctrpersona{
    var $objPersona;
    function __construct($oPersona){
        $this->objPersona = $oPersona;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $id=$this->objPersona->getId();
        $Nombre=$this->objPersona->getNombre();
        $Apellido=$this->objPersona->getApellido();
        $Tel=$this->objPersona->getTel();
        $email=$this->objPersona->getEmail();
        $tipo=$this->objPersona->getTipo();
        
        $sql = "INSERT INTO persona VALUES ('".$id."','".$Nombre."','".$Apellido."','".$Tel."','".$email."','".$tipo."')";
                
        $oCtrConn->ejecutarGuardarSql($sql);
		$oCtrConn->cerrar();
    }
    

    function Consultar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);

        $id = $this->objPersona->getId();
        
        $sql = "SELECT * FROM persona WHERE id='".$id."'";

        $recordSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recordSet->fetch_array(MYSQLI_ASSOC);       
        
        $id=$registro["id"];
        $Nombre=$registro["nombres"];
        $Apellido=$registro["apellidos"];
        $Tel=$registro["telefono"];
        $email=$registro["email"];
        $tipo=$registro["tipo"];

        $this->objPersona = new persona($id, $Nombre, $Apellido, $Tel, $email, $tipo);
        return $this->objPersona;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);  

        $id=$this->objPersona->getId();
        $Nombre=$this->objPersona->getNombre();
        $Apellido=$this->objPersona->getApell();
        $Tel=$this->objPersona->getTel();
        $email=$this->objPersona->getEmail();
        $tipo=$this->objPersona->getTipo();

        if($Nombre==""){$Nombre=null;};
        if($Apellido==""){$Apellido=null;};
        if($Tel==""){$Tel=null;};
        if($email==""){$email=null;};
        if($tipo==""){$tipo=null;};

        $sql = "UPDATE persona SET nombres='".$Nombre."', apellidos='".$Apellido."',telefono='".$Tel."', email='".$email."', tipo='".$tipo."'";

        $oCtrConn->ejecutarModificarSql($sql);
		$oCtrConn->cerrar();
    }

    
    function Eliminar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);

        $id=$this->objPersona->getId();
        
        $sql = "DELETE FROM persona WHERE id=".$id.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>