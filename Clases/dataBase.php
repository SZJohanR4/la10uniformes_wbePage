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

    function Database() {

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

        function insertarUniforme($idUniforme, $equipo, $categoria, $tallas, $precio, $tela, $descuento, $replica_original, $clasificacion, $descripcion, $idproveedor) {
            mysql_query("insert into uniformes (idUniforme,equipo,categoria,tallas,precio,tela,descuento,replica_original,clasificacion,idProveedor,descripcion) values "
                            . "('" . $idUniforme . "','" . $equipo . "','" . $categoria . "','" . $tallas . "','" . $precio . "','" . $tela . "','" . $descuento . "','" . $replica_original . "','" . $clasificacion . "','" . $idproveedor . "','" . $descripcion . "');")
                    or die("la consulta fallo" . mysql_error());
        }

    }

    function insertarImagen($idImagen, $idProveedor, $idUniforme, $tipo, $imagen, $descripcion) {

        mysql_query("insert into imagenes (idImagen,idProveedor,idUniforme,tipo,imagen,descripcion) values "
                        . "('" . $idImagen . "','" . $idProveedor . "','" . $idUniforme . "','" . $tipo . "','" . $imagen . "','" . $descripcion . "');")
                or die("la consulta fallo" . mysql_error());
    }

    function insertarProveedor($idProveedor, $nombre, $apellido, $documento, $email, $contrasena, $cuenta, $direccion, $estado) {

        mysql_query("insert into proveedor (idProveedor,nombre,apellido,documento,email,contrasena,nroCuentaBancaria,direccion,estado) values "
                        . "('" . $idProveedor . "','" . $nombre . "','" . $apellido . "','" . $documento . "','" . $email . "','" . $contrasena . "','" . $cuenta . "','" . $direccion . "','" . $estado . "');")
                or die("la consulta fallo" . mysql_error());
    }

    function eliminarUniforme($iduniforme) {

        mysql_query("delete from uniformes where idUniforme ='" . $iduniforme . "'")
                or die("la consulta fallo" . mysql_error());
    }

}
