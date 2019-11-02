<?php
    class proyecto_financiado{
        var $IDP;
        var $IDF;  
        var $FE; 
        var $POR;

        function proyecto_financiado($IDP, $IDF, $FE, $POR) {
            $this->IDP = $IDP;
            $this->IDF = $IDF;
            $this->FE = $FE;
            $this->POR = $POR;
        }
    
    
        function setIDP($IDP) {
            $this->IDP = $IDP;
        }    
        function setIDF($IDF) {
            $this->IDF = $IDF;
        }    
        function setFE($FE) {
            $this->FE = $FE;
        }    
        function setPOR($POR) {
            $this->POR = $POR;
        } 
        
        
        
        function getIDP(){
            return $this->IDP;
        }
        function getIDF() {
            return $this->IDF;
        }
        function getFE() {
            return $this->FE;
        }
        function getPOR() {
            return $this->POR;
        }
    }
?>