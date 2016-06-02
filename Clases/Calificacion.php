<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calificacion
 *
 * @author Desktop
 */
class Calificacion {

    private $idCalificacion;
    private $comentario;
    private $rango;

    function construct($idCalificacion, $comentario, $rango) {
        $this->idCalificacion = $idCalificacion;
        $this->comentario = $comentario;
        $this->rango = $rango;
    }

    function getIdCalificacion() {
        return $this->idCalificacion;
    }

    function getComentario() {
        return $this->comentario;
    }

    function getRango() {
        return $this->rango;
    }

    function setIdCalificacion($idCalificacion) {
        $this->idCalificacion = $idCalificacion;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    function setRango($rango) {
        $this->rango = $rango;
    }

    function verComentarios($idUniforme) {
        include 'dataBase.php';
        $db = new dataBase();
        $db->conectar();
        $datos = array();
       


        $consulta1 = mysql_query("SELECT  `imagen`  FROM `imagenes` WHERE `idUniforme`=$idUniforme");
        while ($row = mysql_fetch_row($consulta1)) {
            $datos[0] = $row[0]; 
            
            $consulta2 = mysql_query("SELECT  `comentario` FROM `calificacion` WHERE `idUniforme`=$idUniforme");
            while ($row2 = mysql_fetch_row($consulta2)) {
                if($row2[0]==NULL){
                    $datos[1] =" no hay comentarios";
                }else{
                
                $datos[1] = $row2[0];
                }
                
            }
        }
        return $datos;
    }

}
