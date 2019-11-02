<?php
    class proyecto_persona{
        var $id_proyecto;
        var $id_persona;  
        var $rol;

        function proyecto_persona($id_proyecto, $id_persona, $rol) {
            $this->id_proyecto = $id_proyecto;
            $this->id_persona = $id_persona;
            $this->rol = $rol;
        }
    
    
        function setIDP($id_proyecto) {
            $this->id_proyecto = $id_proyecto;
        }    
        function setIDE($id_persona) {
            $this->id_persona = $id_persona;
        }    
        function setROL($rol) {
            $this->rol = $rol;
        }    
        
        
        
        function getIDP(){
            return $this->id_proyecto;
        }
        function getIDE() {
            return $this->id_persona;
        }
        function getROL() {
            return $this->rol;
        }
    }
?>