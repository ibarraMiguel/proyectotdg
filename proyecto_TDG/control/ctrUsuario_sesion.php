<?php
class ctrUsuario_sesion{
    var $objUsuario_Sesion;
    function __construct($ousuario_sesion){
        $this->objUsuario_Sesion = $ousuario_sesion;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $id=$this->objUsuario_Sesion->getID();
        $PRI=$this->objUsuario_Sesion->getPRI();
        $USER=$this->objUsuario_Sesion->getUSER();
        $PASS=$this->objUsuario_Sesion->getPASS();
        
        $sql = "INSERT INTO usuario_sesion VALUES ('".$id."','".$PRI."','".$USER."','".$PASS."')";
                
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

        $id = $this->objUsuario_Sesion->getID();
        
        $sql = "SELECT * FROM usuario_sesion WHERE id_persona='".$id."'";

        $recordSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recordSet->fetch_array(MYSQLI_ASSOC);       
        
        $id=$registro["id_persona"];
        $PRI=$registro["privilegios"];
        $USER=$registro["usuario"];
        $PASS=$registro["clave"];

        $this->objUsuario_Sesion = new usuario_sesion($id, $PRI, $USER, $PASS);
        return $this->objUsuario_Sesion;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);  

        $id=$this->objUsuario_Sesion->getID();
        $PRI=$this->objUsuario_Sesion->getPRI();
        $USER=$this->objUsuario_Sesion->getUSER();
        $PASS=$this->objUsuario_Sesion->getPASS();

        if($PRI==""){$PRI=null;};
        if($USER==""){$USER=null;};
        if($PASS==""){$PASS=null;};

        $sql = "UPDATE usuario_sesion SET privilegios='".$PRI."', usuario='".$USER."', clave='".$PASS."'";

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

        $id=$this->objUsuario_Sesion->getID();
        
        $sql = "DELETE FROM usuario_sesion WHERE id_persona=".$id.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>