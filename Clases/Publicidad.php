<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Publicidad
 *
 * @author Desktop
 */
class Publicidad {

    private $idPublicidad;
    private $titulo;
    private $descripcion;
    private $propietario;
    private $imagen;

    function construct($idPublicidad, $titulo, $descripcion, $propietario, $imagen) {
        $this->idPublicidad = $idPublicidad;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->propietario = $propietario;
        $this->imagen = $imagen;
    }

    function getIdPublicidad() {
        return $this->idPublicidad;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPropietario() {
        return $this->propietario;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setIdPublicidad($idPublicidad) {
        $this->idPublicidad = $idPublicidad;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPropietario($propietario) {
        $this->propietario = $propietario;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function consultarPulbicidad($idProveedor) {
        include 'dataBase.php';
        $db = new dataBase();
        $db->conectar();
        $datos = array();
        
        $consulta1 = mysql_query("SELECT `imagen`, `titulo`, `descripcion` FROM `publicidad` WHERE `idPublicidad`=$idProveedor");  
        while ($row = mysql_fetch_row($consulta1)) {
            $datos[0] = $row[0]; //ruta imagen
            $datos[1]=$row[1];//titulo
            $datos[2]=$row[2];//descripcion
        }
        return $datos;
        
    }

}
