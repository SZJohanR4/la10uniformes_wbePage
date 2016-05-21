<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imagenes
 *
 * @author Sebastian
 */
class imagenes {

    private $idImagen;
    private $idProveedor;
    private $idUniforme;
    private $tipo;
    private $imagen;
    private $descripcion;

    function __construct($idImagen, $idProveedor, $idUniforme, $tipo, $imagen, $descripcion) {
        $this->idImagen = $idImagen;
        $this->idProveedor = $idProveedor;
        $this->idUniforme = $idUniforme;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }

    function getIdImagen() {
        return $this->idImagen;
    }

    function getIdProveedor() {
        return $this->idProveedor;
    }

    function getIdUniforme() {
        return $this->idUniforme;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdImagen($idImagen) {
        $this->idImagen = $idImagen;
    }

    function setIdProveedor($idProveedor) {
        $this->idProveedor = $idProveedor;
    }

    function setIdUniforme($idUniforme) {
        $this->idUniforme = $idUniforme;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function insertarImagen() {
        
    }

    function eliminarImagenes() {
        
    }

    function verImagenes() {
        
    }

}
