<?php

class ctrConexion{	
	var $conx;
	function __construct(){
		$this->conx=null;
	}

    function conectar($servidor, $usuario, $password,$db){		
    	try	{ $this->conx = new mysqli($servidor, $usuario, $password, $db); }
      	catch (Exception $e){ echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n"; }
    }
    function cerrar() {
		try{ $this->conx->close(); }
      	catch (Exception $e){ echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n"; }		
    }


    function ejecutarGuardarSql($sql) {
    	try	{ $this->conx->query($sql); }
		catch (Exception $e) { echo ($e->getMessage()); }	
	}
	function ejecutarConsultaSql($sql) {
		try	{ $recordSet=$this->conx->query($sql); }
		catch (Exception $e) { ($e->getMessage()); }	
		return $recordSet;
	} 
	function ejecutarModificarSql($sql) {
		try	{ $this->conx->query($sql); }
		catch (Exception $e) { ($e->getMessage()); }
	} 
	function ejecutarEliminarSql($sql) {
		try	{ $this->conx->query($sql); }
		catch (Exception $e) { ($e->getMessage()); }
	}   
}
?>
