<?php
    class proyecto{
        var $id;
        var $titulo;  
        var $fechaInisc; 
        var $fechaIni;
        var $fechaFin;
        var $Cofinanciado;
        var $presupuesto;
        var $porcCofinanciado;
        var $estado;
        var $observaciones;
        var $tipoProyecto;

        function proyecto($id, $titulo, $fechaInisc, $fechaIni, $fechaFin, $Cofinanciado, $presupuesto, $porcCofinanciado, $estado, $observaciones, $tipoProyecto) {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->fechaInisc = $fechaInisc;
            $this->fechaIni = $fechaIni;
            $this->fechaFin = $fechaFin;
            $this->Cofinanciado = $Cofinanciado;
            $this->presupuesto = $presupuesto;
            $this->porcCofinanciado = $porcCofinanciado;
            $this->estado = $estado;
            $this->observaciones = $observaciones;
            $this->tipoProyecto = $tipoProyecto;
        }
    
    
        function setId($id) {
            $this->id = $id;
        }    
        function setTitulo($titulo) {
            $this->titulo = $titulo;
        }    
        function setFechaInisc($fechaInisc) {
            $this->fechaInisc = $fechaInisc;
        }    
        function setFechaIni($fechaIni) {
            $this->fechaIni = $fechaIni;
        }    
        function setFechaFin($fechaFin) {
            $this->fechaFin = $fechaFin;
        }    
        function setCofinanciado($Cofinanciado) {
            $this->Cofinanciado = $Cofinanciado;
        }    
        function setPresupuesto($presupuesto) {
            $this->presupuesto = $presupuesto;
        }    
        function setporcCofinanciado($porcCofinanciado) {
            $this->porcCofinanciado = $porcCofinanciado;
        }
        function setEstado($estado) {
            $this->estado = $estado;
        }    
        function setObservaciones($observaciones) {
            $this->observaciones = $observaciones;
        }    
        function setTipoProyecto($tipoProyecto) {
            $this->tipoProyecto = $tipoProyecto;
        }
        
        
        
        function getId(){
            return $this->id;
        }
        function getTitulo() {
            return $this->titulo;
        }
        function getFechaInisc() {
            return $this->fechaInisc;
        }
        function getFechaIni() {
            return $this->fechaIni;
        }
        function getFechaFin() {
            return $this->fechaFin;
        }
        function getCofinanciado() {
            return $this->Cofinanciado;
        }
        function getPresupuesto() {
            return $this->presupuesto;
        }
        function getporcCofinanciado() {
            return $this->porcCofinanciado;
        }
        function getEstado() {
            return $this->estado;
        }
        function getObservaciones() {
            return $this->observaciones;
        }
        function getTipoProyecto() {
            return $this->tipoProyecto;
        }
    }
?>