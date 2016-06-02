<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administrador
 *
 * @author Sebastian
 */
class administrador {
   private $idProveedor;
    private $nombre;
    private $apellido;
    private $documento;
    function getIdProveedor() {
        return $this->idProveedor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDocumento() {
        return $this->documento;
    }

    function setIdProveedor($idProveedor) {
        $this->idProveedor = $idProveedor;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }
     function EliminarUniformes($iduniforme) {
        include '../Clases/dataBase.php';
       
        $db = new dataBase();
        $db->conectar();
        $db->eliminarUniforme($iduniforme);
        
        
    }
    
function realizarBackUP(){
    
}


}
