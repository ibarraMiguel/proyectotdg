<?php
    class documento_proyecto{
        var $ID;
        var $IDEP;  
        var $FE; 
        var $LINK;

        function documento_proyecto($ID, $IDEP, $FE, $LINK) {
            $this->ID = $ID;
            $this->IDEP = $IDEP;
            $this->FE = $FE;
            $this->LINK = $LINK;
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
        function setLINK($LINK) {
            $this->LINK = $LINK;
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
        function getLINK() {
            return $this->LINK;
        }
    }
?>