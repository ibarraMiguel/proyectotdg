<?php
    class usuario_sesion{
        var $ID;
        var $PRI;  
        var $USER; 
        var $PASS;

        function usuario_sesion($ID, $PRI, $USER, $PASS) {
            $this->ID = $ID;
            $this->PRI = $PRI;
            $this->USER = $USER;
            $this->PASS = $PASS;
        }
    
    
        function setID($ID) {
            $this->ID = $ID;
        }    
        function setPRI($PRI) {
            $this->PRI = $PRI;
        }    
        function setUSER($USER) {
            $this->USER = $USER;
        }    
        function setPASS($PASS) {
            $this->PASS = $PASS;
        } 
        
        
        
        function getID(){
            return $this->ID;
        }
        function getPRI() {
            return $this->PRI;
        }
        function getUSER() {
            return $this->USER;
        }
        function getPASS() {
            return $this->PASS;
        }
    }
?>