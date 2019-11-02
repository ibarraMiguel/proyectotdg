<?php
class ctrProyecto_Financiado{
    var $objProyecto_Financiado;
    function __construct($oProyecto_Financiado){
        $this->objProyecto_Financiado = $oProyecto_Financiado;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $IDP=$this->objProyecto_Financiado->getIDP();
        $IDF=$this->objProyecto_Financiado->getIDF();
        $FE=$this->objProyecto_Financiado->getFE();
        $POR=$this->objProyecto_Financiado->getPOR();
        
        $sql = "INSERT INTO proyecto_financiado VALUES ('".$IDP."','".$IDF."','".$FE."','".$POR."')";
                
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

        $IDP = $this->objProyecto_Financiado->getIDP();
        
        $sql = "SELECT * FROM proyecto_financiado WHERE idProyecto='".$IDP."'";

        $recorset = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recorset->fetch_array(MYSQLI_ASSOC);       
        
        $IDP=$registro["idProyecto"];
        $IDF=$registro["idFinanciador"];
        $FE=$registro["fecha"];
        $POR=$registro["porcentaje"];

        $this->objProyecto_Financiado = new Proyecto_Financiado($IDP, $IDF, $FE, $POR);
        return $this->objProyecto_Financiado;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$FEWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$FEWord,$bd);  

        $IDP=$this->objProyecto_Financiado->getIDP();
        $IDF=$this->objProyecto_Financiado->getIDF();
        $FE=$this->objProyecto_Financiado->getFE();
        $POR=$this->objProyecto_Financiado->getPOR();

        if($IDP==""){$IDP=null;};
        if($IDF==""){$IDF=null;};
        if($FE==""){$FE=null;};
        if($POR==""){$POR=null;};

        $sql = "UPDATE proyecto_financiado SET fecha='".$FE."', porcentaje='".$POR."' WHERE idProyecto='".$IDP."'";

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

        $IDP=$this->objProyecto_Financiado->getIDP();
        
        $sql = "DELETE FROM proyecto_financiado WHERE idProyecto=".$IDP.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>