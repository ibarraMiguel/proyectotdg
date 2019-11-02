<?php
class ctrProyecto_Persona{
    var $objProyecto_Persona;
    function __construct($oProyecto_Persona){
        $this->objProyecto_Persona = $oProyecto_Persona;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $id_proyecto=$this->objProyecto_Persona->getIDP();
        $id_persona=$this->objProyecto_Persona->getIDE();
        $rol=$this->objProyecto_Persona->getROL();

        echo($id_proyecto."   ".$id_persona."    ".$rol);
        
        $sql = "INSERT INTO proyecto_persona VALUES ('".$id_persona."', ".$id_proyecto.",'".$rol."')";
                
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

        $id_proyecto = $this->objProyecto_Persona->getIDP();
        
        $sql = "SELECT * FROM proyecto_persona WHERE idProyecto='".$id_proyecto."'";

        $recordSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recordSet->fetch_array(MYSQLI_ASSOC);       
        
        $id_persona=$registro["idPersona"];
        $id_proyecto=$registro["idProyecto"];
        $rol=$registro["rol"];

        $this->objProyecto_Persona = new proyecto_persona($id_proyecto, $id_persona, $rol);
        return $this->objProyecto_Persona;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);  

        $id_proyecto=$this->objProyecto_Persona->getIDP();
        $id_persona=$this->objProyecto_Persona->getIDE();
        $rol=$this->objProyecto_Persona->getROL();

        
        if($rol==""){$rol=null;};

        $sql = "UPDATE proyecto_persona SET rol='".$rol."'";

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

        $id_proyecto=$this->objProyecto_Persona->getIDP();
        
        $sql = "DELETE FROM proyecto_persona WHERE idProyecto=".$id_proyecto.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>