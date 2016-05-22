<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reserva
 *
 * @author Sebastian
 */
class Reserva {
   private $idReserva;
    private $Fecha;
    private $Proveedor;
    private $Uniforme;
    private $Usuario;
    private $Precio;
    private $Cantidad;
    function getIdReserva() {
        return $this->idReserva;
    }

    function getFecha() {
        return $this->Fecha;
    }

    function getProveedor() {
        return $this->Proveedor;
    }

    function getUniforme() {
        return $this->Uniforme;
    }

    function getUsuario() {
        return $this->Usuario;
    }

    function getPrecio() {
        return $this->Precio;
    }

    function getCantidad() {
        return $this->Cantidad;
    }

    function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    function setProveedor($Proveedor) {
        $this->Proveedor = $Proveedor;
    }

    function setUniforme($Uniforme) {
        $this->Uniforme = $Uniforme;
    }

    function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    function setPrecio($Precio) {
        $this->Precio = $Precio;
    }

    function setCantidad($Cantidad) {
        $this->Cantidad = $Cantidad;
    }

function Reservar($iduniforme) {
        include '../Clases/dataBase.php';
       
        $db = new dataBase();
        $db->conectar();
        $db->eliminarUniforme($iduniforme);
        
        
    }
}
