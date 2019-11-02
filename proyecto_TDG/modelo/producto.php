<?php
    class producto{
        var $ID;
        var $IDEP;  
        var $FE; 
        var $CAT;

        function producto($ID, $IDEP, $FE, $CAT) {
            $this->ID = $ID;
            $this->IDEP = $IDEP;
            $this->FE = $FE;
            $this->CAT = $CAT;
        }
    
    
        function setID($ID) {
            $this->ID = $ID;
        }    
        function setIDEP($IDEP) {
            $this->IDEP = $IDEP;
        }    
        function setFE($FE) {
            $this->FE = $FE;
        }    
        function setCAT($CAT) {
            $this->CAT = $CAT;
        } 
        
        
        
        function getID(){
            return $this->ID;
        }
        function getIDEP() {
            return $this->IDEP;
        }
        function getFE() {
            return $this->FE;
        }
        function getCAT() {
            return $this->CAT;
        }
    }
?>