<?php
class ctrDocumento_Proyecto{
    var $objDocumento_Proyecto;
    function __construct($oDocumento_Proyecto){
        $this->objDocumento_Proyecto = $oDocumento_Proyecto;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $ID=$this->objDocumento_Proyecto->getID();
        $IDEP=$this->objDocumento_Proyecto->getIDEP();
        $FE=$this->objDocumento_Proyecto->getFE();
        $LINK=$this->objDocumento_Proyecto->getLINK();
        
        $sql = "INSERT INTO documentos_proyecto VALUES ('".$ID."','".$IDEP."','".$FE."','".$LINK."')";
                
        $oCtrConn->ejecutarGuardarSql($sql);
		$oCtrConn->cerrar();
    }
    

    function Consultar(){
        $servidor="localhost";
		$usuario="root";
		$FEWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$FEWord,$bd);

        $ID = $this->objDocumento_Proyecto->getID();
        
        $sql = "SELECT * FROM documentos_proyecto WHERE idDocumento='".$ID."'";

        $reLINKdSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $reLINKdSet->fetch_array(MYSQLI_ASSOC);       
        
        $ID=$registro["idDocumento"];
        $IDEP=$registro["idProyecto"];
        $FE=$registro["fecha"];
        $LINK=$registro["enlace"];

        $this->objDocumento_Proyecto = new documento_proyecto($ID, $IDEP, $FE, $LINK);
        return $this->objDocumento_Proyecto;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$FEWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$FEWord,$bd);  

        $ID=$this->objDocumento_Proyecto->getID();
        $IDEP=$this->objDocumento_Proyecto->getIDEP();
        $FE=$this->objDocumento_Proyecto->getFE();
        $LINK=$this->objDocumento_Proyecto->getLINK();

        if($IDEP==""){$IDEP=null;};
        if($FE==""){$FE=null;};
        if($LINK==""){$LINK=null;};

        $sql = "UPDATE documentos_proyecto SET idProyecto='".$IDEP."', fecha='".$FE."', enlace='".$LINK."'";

        $oCtrConn->ejecutarModificarSql($sql);
		$oCtrConn->cerrar();
    }

    
    function Eliminar(){
        $servidor="localhost";
		$usuario="root";
		$FEWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$FEWord,$bd);

        $ID=$this->objDocumento_Proyecto->getID();
        
        $sql = "DELETE FROM documentos_proyecto WHERE idDocumento=".$ID.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>