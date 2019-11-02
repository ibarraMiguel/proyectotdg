<?php
class ctrProducto{
    var $objProducto;
    function __construct($oProducto){
        $this->objProducto = $oProducto;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $ID=$this->objProducto->getID();
        $IDEP=$this->objProducto->getIDEP();
        $FE=$this->objProducto->getFE();
        $CAT=$this->objProducto->getCAT();
        
        $sql = "INSERT INTO producto VALUES ('".$ID."','".$IDEP."','".$FE."','".$CAT."')";
                
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

        $ID = $this->objProducto->getID();
        
        $sql = "SELECT * FROM producto WHERE id='".$ID."'";

        $reCATdSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $reCATdSet->fetch_array(MYSQLI_ASSOC);       
        
        $ID=$registro["id"];
        $IDEP=$registro["idProyecto"];
        $FE=$registro["fecha"];
        $CAT=$registro["categoria"];

        $this->objProducto = new Producto($ID, $IDEP, $FE, $CAT);
        return $this->objProducto;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$FEWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$FEWord,$bd);  

        $ID=$this->objProducto->getID();
        $IDEP=$this->objProducto->getIDEP();
        $FE=$this->objProducto->getFE();
        $CAT=$this->objProducto->getCAT();

        if($IDEP==""){$IDEP=null;};
        if($FE==""){$FE=null;};
        if($CAT==""){$CAT=null;};

        $sql = "UPDATE producto SET idProyecto='".$IDEP."', fecha='".$FE."', categoria='".$CAT."'";

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

        $ID=$this->objProducto->getID();
        
        $sql = "DELETE FROM producto WHERE id=".$ID.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>