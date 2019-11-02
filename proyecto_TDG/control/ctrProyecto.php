<?php
class ctrProyecto{
    var $objProyecto;
    function __construct($oProyecto){
        $this->objProyecto = $oProyecto;
    }

    function Guardar(){
        $servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);
        
        $id=$this->objProyecto->getId();
        $Tit=$this->objProyecto->getTitulo();
        $FechaIns=$this->objProyecto->getFechaInisc();

        $FechaIni=$this->objProyecto->getFechaIni();
        $FechaFin=$this->objProyecto->getFechaFin();
        if($FechaIni==''){
            $FechaIni=null;
        } 
        if($FechaFin==''){
            $FechaFin=null;
        }
        $Cofin=$this->objProyecto->getCofinanciado();
        $Presu=$this->objProyecto->getPresupuesto();
        $porcCofi=$this->objProyecto->getPorcCofinanciado();
        if($Presu==''){
            $Presu=null;
        }
        if($porcCofi==''){
            $porcCofi=null;
        }
        
        $est=$this->objProyecto->getEstado();
        $Observ=$this->objProyecto->getObservaciones();
        $tProy=$this->objProyecto->getTipoProyecto();
        
        $sql = "INSERT INTO proyecto VALUES (".$id.",'".$Tit."','".$FechaIns."','".$FechaIni."','".$FechaFin."',".$Cofin.",".$Presu.",".$porcCofi.",'".$est."','".$Observ."','".$tProy."')";
                
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

        $id = $this->objProyecto->getId();
        $Tit=$this->objProyecto->getTitulo();
        if($id==''){$id=null;};
        if($Tit==''){$Tit=null;};
        
        $sql = "SELECT * FROM proyecto WHERE id=".$id." OR titulo='".$Tit."'";

        $recordSet = $oCtrConn->ejecutarConsultaSql($sql);        
        $registro = $recordSet->fetch_array(MYSQLI_ASSOC);       
        
        $id=$registro["id"];
        $Tit=$registro["titulo"];
        $FechaIns=$registro["fechaInsc"];
        $FechaIni=$registro["fechaIni"];
        $FechaFin=$registro["fechaFin"];
        $Cofin=$registro["cofinanciado"];
        $Presu=$registro["presupuesto"];
        $porcCofi=$registro["porcCofinanciado"];
        $est=$registro["estado"];
        $Observ=$registro["observaciones"];
        $tProy=$registro["tipoProyecto"];

        $this->objProyecto = new proyecto($id, $Tit, $FechaIns, $FechaIni, $FechaFin, $Cofin, $Presu, $porcCofi, $est, $Observ, $tProy);

        return $this->objProyecto;
        $oCtrConn->cerrar();        
    }

    
    function Modificar(){
		$servidor="localhost";
		$usuario="root";
		$passWord="";
		$bd="proyectotdg";
		$oCtrConn = new ctrConexion();
        $oCtrConn->conectar($servidor,$usuario,$passWord,$bd);  

        $id=$this->objProyecto->getId();
        $Tit=$this->objProyecto->getTitulo();
        $FechaIns=$this->objProyecto->getFechaInisc();
        $FechaIni=$this->objProyecto->getFechaIni();
        $FechaFin=$this->objProyecto->getFechaFin();
        $Cofin=$this->objProyecto->getCofinanciado();
        $Presu=$this->objProyecto->getPresupuesto();
        $porcCofi=$this->objProyecto->getPorcCofinanciado();
        $est=$this->objProyecto->getEstado();
        $Observ=$this->objProyecto->getObservaciones();
        $tProy=$this->objProyecto->getTipoProyecto();

        if($Tit==""){$Tit=null;};
        if($FechaIns==""){$FechaIns=null;};
        if($FechaIni==""){$FechaIni=null;};
        if($FechaFin==""){$FechaFin=null;};
        if($Cofin==""){$Cofin=null;};
        if($Presu==""){$Presu=null;};
        if($porcCofi==""){$porcCofi=null;};
        if($est==""){$est=null;};
        if($Observ==""){$Observ=null;};
        if($tProy==""){$tProy=null;};

        $sql = "UPDATE proyecto SET titulo='".$Tit."', fechaInsc='".$FechaIns."',fechaIni='".$FechaIni."', fechaFin='".$FechaFin."', cofinanciado=".$Cofin.", presupuesto=".$Presu.", porcCofinanciado=".$porcCofi.", estado='".$est."', observaciones='".$Observ."', tipoProyecto='".$tProy."' WHERE id=".$id."";

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

        $id=$this->objProyecto->getId();
        
        $sql = "DELETE FROM proyecto WHERE id=".$id.""; 

        $oCtrConn->ejecutarEliminarSql($sql);
		$oCtrConn->cerrar();
    }
}

?>