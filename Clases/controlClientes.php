<?php


include 'registro.php';

if(isset($_POST['Eliminar'])){
     $idCliente = $_POST['Eliminar'];

    $id = explode(".", $idCliente);
    $idCliente = $id[0];
    $registro = new Registro();
    $registro->eliminarCliente($idCliente);
}

