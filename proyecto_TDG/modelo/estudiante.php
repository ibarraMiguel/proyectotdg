<?php
    class estudiante{
        var $id_persona;
        var $id_estudiante;  
        var $promedio;

        function estudiante($id_persona, $id_estudiante, $promedio) {
            $this->id_persona = $id_persona;
            $this->id_estudiante = $id_estudiante;
            $this->promedio = $promedio;
        }
    
    
        function setId_persona($id_persona) {
            $this->id_persona = $id_persona;
        }    
        function setId_estudiante($id_estudiante) {
            $this->id_estudiante = $id_estudiante;
        }    
        function setPromedio($promedio) {
            $this->promedio = $promedio;
        }    
        
        
        
        function getId_persona(){
            return $this->id_persona;
        }
        function getId_estudiante() {
            return $this->id_estudiante;
        }
        function getPromedio() {
            return $this->promedio;
        }
    }
?>