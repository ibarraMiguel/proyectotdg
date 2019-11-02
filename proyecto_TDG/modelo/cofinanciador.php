<?php
    class cofinanciador{
        var $ID;
        var $NOM;  
        var $TEL; 
        var $COR;

        function cofinanciador($ID, $NOM, $TEL, $COR) {
            $this->ID = $ID;
            $this->NOM = $NOM;
            $this->TEL = $TEL;
            $this->COR = $COR;
        }
    
    
        function setID($ID) {
            $this->ID = $ID;
        }    
        function setNOM($NOM) {
            $this->NOM = $NOM;
        }    
        function setTEL($TEL) {
            $this->TEL = $TEL;
        }    
        function setCOR($COR) {
            $this->COR = $COR;
        } 
        
        
        
        function getID(){
            return $this->ID;
        }
        function getNOM() {
            return $this->NOM;
        }
        function getTEL() {
            return $this->TEL;
        }
        function getCOR() {
            return $this->COR;
        }
    }
?>