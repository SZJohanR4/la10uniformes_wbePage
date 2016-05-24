<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registro
 *
 * @author GOMEZ
 */
include 'dataBase.php';

class Registro {

    //put your code here

    function registrarSubscripcion($idProveedor) {

        $db = new dataBase();
        $db->conectar();
        $db->editarEstado($idProveedor);
        echo '<script language="javascript">
    window.location = "../GUI/Administrador/Paginas/verProveedores.php";
</script>';
    }

    function eliminarProveedor($idProveedor) {

        $db = new dataBase();
        $db->conectar();
        $db->eliminarProveedores($idProveedor);

        echo '<script language="javascript">
    window.location = "../GUI/Administrador/Paginas/verProveedores.php";
</script>';
    }

    function cambiarEstado($idProveedor, $estado) {

        $db = new dataBase();
        $db->conectar();
        $db->cambiarEstado($idProveedor, $estado);

        echo '<script language="javascript">
    window.location = "../GUI/Administrador/Paginas/verProveedores.php";
</script>';
    }

    function actualizarDatosProveedor($id, $nombre, $apellido, $documento, $correo, $cuentaBancaria, $direccion, $estado) {
        $db = new DataBase();
        $db->conectar();
        $db->actualizarDatosProveedor($id, $nombre, $apellido, $documento, $correo, $cuentaBancaria, $direccion, $estado);
        echo '<script language="javascript">
    window.location = "../GUI/Administrador/Paginas/verProveedores.php";
</script>';
    }
    
    
    function eliminarCliente($idCliente) {

        $db = new dataBase();
        $db->conectar();
        $db->eliminarCliente($idCliente);

        echo '<script language="javascript">
    window.location = "../GUI/Administrador/Paginas/verClientes.php";
</script>';
    }
    

}

?>