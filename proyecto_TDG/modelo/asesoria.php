<?php
    class asesoria{
        var $ID;
        var $IDPR;  
        var $IDPE; 
        var $FECHA;
        var $ASE;

        function asesoria($ID, $IDPR, $IDPE, $FECHA, $ASE) {
            $this->ID = $ID;
            $this->IDPR = $IDPR;
            $this->IDPE = $IDPE;
            $this->FECHA = $FECHA;
            $this->ASE = $ASE;
        }
    
    
        function setID($ID) {
            $this->ID = $ID;
        }    
        function setIDPR($IDPR) {
            $this->IDPR = $IDPR;
        }    
        function setIDPE($IDPE) {
            $this->IDPE = $IDPE;
        }    
        function setFECHA($FECHA) {
            $this->FECHA = $FECHA;
        }    
        function setASE($ASE) {
            $this->ASE = $ASE;
        } 
        
        
        
        function getID(){
            return $this->ID;
        }
        function getIDPR() {
            return $this->IDPR;
        }
        function getIDPE() {
            return $this->IDPE;
        }
        function getFECHA() {
            return $this->FECHA;
        }
        function getASE() {
            return $this->ASE;
        }
    }
?>