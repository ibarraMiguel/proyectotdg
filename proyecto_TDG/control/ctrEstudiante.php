<?php
class ctrEstudiante{
    var $objEstudiante;
    function __construct($oEstudiante){
        $this->objEstudiante = $oEstudiante;
    }

    function Guardar(){
        $servid_personaor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servid_personaor,$usuario,$passWord,$bd);
        
        $id_persona=$this->objEstudiante->getId_persona();
        $id_estudiante=$this->objEstudiante->getId_estudiante();
        $promedio=$this->objEstudiante->getPromedio();
        
        $sql = "INSERT INTO estudiante VALUES ('".$id_persona."','".$id_estudiante."','".$promedio."')";
                
        $oCtrConn->ejecutarGuardarSql($sql);
		$oCtrConn->cerrar();
    }
    

    function Consultar(){
        $servid_personaor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servid_personaor,$usuario,$passWord,$bd);

        $id_persona = $this->objEstudiante->getId_persona();
        
        $sql = "SELECT * FROM Estudiante WHERE id_persona='".$id_persona."'";

        $recordSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recordSet->fetch_array(MYSQLI_ASSOC);       
        
        $id_persona=$registro["id_persona"];
        $id_estudiante=$registro["id_estudiante"];
        $promedio=$registro["promedio"];

        $this->objEstudiante = new estudiante($id_persona, $id_estudiante, $promedio);
        return $this->objEstudiante;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servid_personaor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servid_personaor,$usuario,$passWord,$bd);  

        $id_persona=$this->objEstudiante->getId_persona();
        $id_estudiante=$this->objEstudiante->getId_estudiante();
        $promedio=$this->objEstudiante->getPromedio();

        if($id_estudiante==""){$id_estudiante=null;};
        if($id_estudiante==""){$id_estudiante=null;};
        if($promedio==""){$promedio=null;};

        $sql = "UPDATE estudiante SET promedio='".$promedio."'";

        $oCtrConn->ejecutarModificarSql($sql);
		$oCtrConn->cerrar();
    }

    
    function Eliminar(){
        $servid_personaor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servid_personaor,$usuario,$passWord,$bd);

        $id_persona=$this->objEstudiante->getId_persona();
        
        $sql = "DELETE FROM estudiante WHERE id_persona=".$id_persona.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>