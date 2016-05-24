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

    function insertarUniforme($idUniforme, $equipo, $categoria, $tallas, $precio, $tela, $descuento, $replica_original, $clasificacion, $descripcion, $idproveedor) {
        mysql_query("insert into uniformes (idUniforme,equipo,categoria,tallas,precio,tela,descuento,replica_original,clasificacion,idProveedor,descripcion) values "
                        . "('" . $idUniforme . "','" . $equipo . "','" . $categoria . "','" . $tallas . "','" . $precio . "','" . $tela . "','" . $descuento . "','" . $replica_original . "','" . $clasificacion . "','" . $idproveedor . "','" . $descripcion . "');")
                or die("la consulta fallo" . mysql_error());
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
        mysql_query("insert into contrasena (usuario,contrasena,rol) values "
                        . "('" . $idProveedor . "','" . $contrasena . "','PROVEEDOR');")
                or die("la consulta fallo" . mysql_error());
    }

    function eliminarUniforme($iduniforme) {

        mysql_query("delete from uniformes where idUniforme ='" . $iduniforme . "'")
                or die("la consulta fallo" . mysql_error());
    }

    //  Codigo Realizado por Elkin
    // function para editar estado de los proveedores a estado subscrito!
    function editarEstado($id) {
        mysql_query("UPDATE proveedor SET estado='SUBSCRITO' WHERE idProveedor='" . $id . "'")
                or die("la consulta fallo" . mysql_error());
    }

// function para eliminar una petición de solicitud 
    function eliminar($id) {

        mysql_query("delete from peticiones where idProveedor='" . $id . "'")
                or die("la consulta fallo" . mysql_error());
    }

    // function paraq eliminar un proveedor en especifico de acuerdo a el id pasado como parametro

    function eliminarProveedores($id) {

        mysql_query("delete from proveedor where idProveedor='" . $id . "'")
                or die("la consulta fallo" . mysql_error());
    }

    // cambiar estado de dicho proveedor a un estado de acuerdo al pasado en el parametro
    function cambiarEstado($id, $estado) {
        mysql_query("UPDATE proveedor SET estado='" . $estado . "'" . " WHERE idProveedor='" . $id . "'")
                or die("la consulta fallo" . mysql_error());
    }

// actualizar los datos del proveedor
    function actualizarDatosProveedor($id, $nombre, $apellido, $documento, $correo, $cuentaBancaria, $direccion, $estado) {
        mysql_query("UPDATE proveedor SET nombre='" . $nombre . "'" . ", apellido='" . $apellido . "'" . ", documento='" . $documento . "'" . ", email='" . $correo . "'" . ", nroCuentaBancaria='" . $cuentaBancaria . "'" . ", direccion='" . $direccion . "'" . ", estado='" . $estado . "'" . " WHERE idProveedor='" . $id . "'")
                or die("la consulta fallo" . mysql_error());
    }

//metodo para eliminar un cliente en especifico usando el id psado por el parametro $id
    function eliminarCliente($id) {

        mysql_query("delete from usuarios where idUsuario='" . $id . "'")
                or die("la consulta fallo" . mysql_error());
    }

}
