<?php



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subscripcion
 *
 * @author Desktop
 */
include './Sistema_De_Solicitud.php';


class Subscripcion extends Sistema_De_Solicitud {

    private $idSuscripcion;
    private $idProveedor;
    private $fechaInicioSuscripcion;
    private $fechaCaducacion;
    private $tipo;
    private $precio;

    function solicitarSubscripcion($img,$nombre,$titulo,$descripcion) {
       $db=new dataBase();
       $db->conectar();
        
       echo $descripcion."   +   ".$nombre."   +  ".$titulo."     +    ".$img;
        
        
        }
    }

