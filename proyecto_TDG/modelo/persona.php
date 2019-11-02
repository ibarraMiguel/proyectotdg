<?php
    class persona{
        var $id;
        var $nombre;  
        var $apellido; 
        var $telefono;
        var $email;
        var $tipo;

        function persona($id, $nombre, $apellido, $telefono, $email, $tipo) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->email = $email;
            $this->tipo = $tipo;
        }
    
    
        function setId($id) {
            $this->id = $id;
        }    
        function setNombre($nombre) {
            $this->nombre = $nombre;
        }    
        function setApellido($apellido) {
            $this->apellido = $apellido;
        }    
        function setTelefono($telefono) {
            $this->telefono = $telefono;
        }    
        function setEmail($email) {
            $this->email = $email;
        }    
        function setTipo($tipo) {
            $this->tipo = $tipo;
        }
        
        
        
        function getId(){
            return $this->id;
        }
        function getNombre() {
            return $this->nombre;
        }
        function getApell() {
            return $this->apellido;
        }
        function getTel() {
            return $this->telefono;
        }
        function getEmail() {
            return $this->email;
        }
        function getTipo() {
            return $this->tipo;
        }
    }
?>