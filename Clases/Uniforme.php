<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uniforme
 *
 * @author Sebastian
 */
class Uniforme {

    private $idUniforme;
    private $equipo;
    private $categoria;
    private $tallas;
    private $precio;
    private $tela;
    private $descuento;
    private $replica_original;
    private $clasificacion;
    private $descripcion;
    private $idproveedor;

    function __construct($idUniforme, $equipo, $categoria, $tallas, $precio, $tela, $descuento, $replica_original, $clasificacion, $descripcion) {
        $this->idUniforme = $idUniforme;
        $this->equipo = $equipo;
        $this->categoria = $categoria;
        $this->tallas = $tallas;
        $this->precio = $precio;
        $this->tela = $tela;
        $this->descuento = $descuento;
        $this->replica_original = $replica_original;
        $this->clasificacion = $clasificacion;
        $this->descripcion = $descripcion;
    }

    function getIdUniforme() {
        return $this->idUniforme;
    }

    function getEquipo() {
        return $this->equipo;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getTallas() {
        return $this->tallas;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getTela() {
        return $this->tela;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getReplica_original() {
        return $this->replica_original;
    }

    function getClasificacion() {
        return $this->clasificacion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdUniforme($idUniforme) {
        $this->idUniforme = $idUniforme;
    }

    function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setTallas($tallas) {
        $this->tallas = $tallas;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setTela($tela) {
        $this->tela = $tela;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setReplica_original($replica_original) {
        $this->replica_original = $replica_original;
    }

    function setClasificacion($clasificacion) {
        $this->clasificacion = $clasificacion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function consultarDetallesUniforme() {
        
    }

    function EliminarUniformes() {
        
    }

    function insertarUniforme($idUniforme,$equipo,$categoria,$tallas,$precio,$tela,$descuento,$replica_original,$clasificacion,$descripcion,$idproveedor){
        include './dataBase.php';
        $db = new dataBase();
        $db->conectar();
        $db->insertarUniforme($idUniforme,$equipo,$categoria,$tallas,$precio,$tela,$descuento,$replica_original,$clasificacion,$descripcion,$idproveedor);
        
    }

    function actualizarUniforme() {
        
    }

}
