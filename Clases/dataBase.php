<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dataBase
 *
 * @author Desktop
 */
class dataBase {

    private $servidor;
    private $usuario;
    private $clave;
    private $nombreDB;

    function database() {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->clave = "";
        $this->nombreDB = "la10uniformes";
    }

    function conectar() {
        $link = mysql_connect($this->servidor, $this->usuario, $this->clave);
        mysql_select_db($this->nombreDB, $link);
    }
    function insertarUniforme($idUniforme,$equipo,$categoria,$tallas,$precio,$tela,$descuento,$replica_original,$clasificacion,$descripcion,$idproveedor) {

        $a=("insert into uniformes (idUniforme,equipo,categoria,tallas,precio,tela,descuento,replica_original,clasificacion,idProveedor,descripcion) values "
                . "('" . $idUniforme . "','" . $equipo . "','" . $categoria . "','" . $tallas . "','" . $precio . "','" . $tela . "','" . $descuento . "','" . $replica_original . "','" . $clasificacion . "','" . $idproveedor . "','" . $descripcion . "');")
                or die("la consulta fallo" . mysql_error());  
        echo "$a";
    }
    
    
}
