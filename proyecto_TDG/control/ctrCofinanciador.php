<?php
class ctrCofinanciador{
    var $objCofinanciador;
    function __construct($oCofinanciador){
        $this->objCofinanciador = $oCofinanciador;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $ID=$this->objCofinanciador->getID();
        $NOM=$this->objCofinanciador->getNOM();
        $TEL=$this->objCofinanciador->getTEL();
        $COR=$this->objCofinanciador->getCOR();
        
        $sql = "INSERT INTO cofinanciador VALUES ('".$ID."','".$NOM."','".$TEL."','".$COR."')";
                
        $oCtrConn->ejecutarGuardarSql($sql);
		$oCtrConn->cerrar();
    }
    

    function Consultar(){
        $servidor="localhost";
		$usuario="root";
		$TELWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$TELWord,$bd);

        $ID = $this->objCofinanciador->getID();
        
        $sql = "SELECT * FROM cofinanciador WHERE id='".$ID."'";

        $recordSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recordSet->fetch_array(MYSQLI_ASSOC);       
        
        $ID=$registro["id"];
        $NOM=$registro["Nombre"];
        $TEL=$registro["telefono"];
        $COR=$registro["correo"];

        $this->objCofinanciador = new cofinanciador($ID, $NOM, $TEL, $COR);
        return $this->objCofinanciador;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$TELWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$TELWord,$bd);  

        $ID=$this->objCofinanciador->getID();
        $NOM=$this->objCofinanciador->getNOM();
        $TEL=$this->objCofinanciador->getTEL();
        $COR=$this->objCofinanciador->getCOR();

        if($NOM==""){$NOM=null;};
        if($TEL==""){$TEL=null;};
        if($COR==""){$COR=null;};

        $sql = "UPDATE cofinanciador SET Nombre='".$NOM."', telefono='".$TEL."', correo='".$COR."'";

        $oCtrConn->ejecutarModificarSql($sql);
		$oCtrConn->cerrar();
    }

    
    function Eliminar(){
        $servidor="localhost";
		$usuario="root";
		$TELWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$TELWord,$bd);

        $ID=$this->objCofinanciador->getID();
        
        $sql = "DELETE FROM cofinanciador WHERE id=".$ID.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>