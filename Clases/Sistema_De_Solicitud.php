<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sistema_De_Solicitud
 *
 * @author Desktop
 */
class Sistema_De_Solicitud {
    private $fechaSolicitud;
    private $tipo;
    private $solicitante;
    
    
    function construct($fechaSolicitud, $tipo, $solicitante) {
        $this->fechaSolicitud = $fechaSolicitud;
        $this->tipo = $tipo;
        $this->solicitante = $solicitante;
        
    }

    function getFechaSolicitud() {
        return $this->fechaSolicitud;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getSolicitante() {
        return $this->solicitante;
    }

    function setFechaSolicitud($fechaSolicitud) {
        $this->fechaSolicitud = $fechaSolicitud;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setSolicitante($solicitante) {
        $this->solicitante = $solicitante;
    }


    function verSolicitudes(){
        
    }
    
    function eliminarSolicitud(){
        
    }
}
