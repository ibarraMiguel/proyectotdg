<?php
class ctrAsesoria{
    var $objAsesoria;
    function __construct($oAsesoria){
        $this->objAsesoria = $oAsesoria;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $ID=$this->objAsesoria->getId();
        $IDPR=$this->objAsesoria->getIDPR();
        $IDPE=$this->objAsesoria->getIDPE();
        $FECHA=$this->objAsesoria->getFECHA();
        $ASE=$this->objAsesoria->getASE();
        
        $sql = "INSERT INTO asesorias VALUES ('".$ID."','".$IDPR."','".$IDPE."','".$FECHA."','".$ASE."')";

        echo($sql);
                
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

        $ID = $this->objAsesoria->getId();
        
        $sql = "SELECT * FROM asesorias WHERE id='".$ID."'";

        $recordSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recordSet->fetch_array(MYSQLI_ASSOC);       
        
        $ID=$registro["id"];
        $IDPR=$registro["idProyecto"];
        $IDPE=$registro["idPersona"];
        $FECHA=$registro["fecha"];
        $ASE=$registro["asesoria"];

        $this->objAsesoria = new asesoria($ID, $IDPR, $IDPE, $FECHA, $ASE);
        return $this->objAsesoria;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);  

        $ID=$this->objAsesoria->getId();
        $IDPR=$this->objAsesoria->getIDPR();
        $IDPE=$this->objAsesoria->getIDPE();
        $FECHA=$this->objAsesoria->getFECHA();
        $ASE=$this->objAsesoria->getASE();

        if($IDPR==""){$IDPR=null;};
        if($IDPE==""){$IDPE=null;};
        if($FECHA==""){$FECHA=null;};
        if($ASE==""){$ASE=null;};

        $sql = "UPDATE asesorias SET idProyecto='".$IDPR."', idPersona='".$IDPE."',fecha='".$FECHA."', asesoria='".$ASE."'";

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

        $ID=$this->objAsesoria->getId();
        
        $sql = "DELETE FROM asesorias WHERE id=".$ID.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>