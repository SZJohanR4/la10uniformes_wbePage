<?php


include 'registro.php';


if (isset($_POST['Subscribir'])) {


    $idProveedor = $_POST['Subscribir'];

    $id = explode(".", $idProveedor);
    $idProveedor = $id[0];
    $registro = new Registro();
    $registro->registrarSubscripcion($idProveedor);

}
if(isset($_POST['Eliminar'])){
     $idProveedor = $_POST['Eliminar'];

    $id = explode(".", $idProveedor);
    $idProveedor = $id[0];
    $registro = new Registro();
    $registro->eliminarProveedor($idProveedor);
}
if(isset($_POST['NoActivo'])){
    
     $idProveedor = $_POST['NoActivo'];

    $id = explode(".", $idProveedor);
    $idProveedor = $id[0];
    $estado="NO_ACTIVO";
    $registro = new Registro();
    $registro->cambiarEstado($idProveedor, $estado);
}
if(isset($_POST['Activo'])){
    
     $idProveedor = $_POST['Activo'];

    $id = explode(".", $idProveedor);
    $idProveedor = $id[0];
    $estado="ACTIVO";
    $registro = new Registro();
    $registro->cambiarEstado($idProveedor, $estado);
}

if (isset($_POST['actualizar'])) {
    
 $idProveedor = $_POST['actualizar'];   
 $id = explode(".", $idProveedor);
    $idProveedor = $id[0];
 echo $idProveedor;
$nombre =$_POST['Nombre'];
$apellido=$_POST['Apellido'];
$documento=$_POST['Documento'];
$correo=$_POST['correo'];
$cuenta=$_POST['nroCuentaBancaria'];
$direccion=$_POST['direccion'];
$estado=$_POST['estado'];

$actualizacion=new Registro();
$actualizacion->actualizarDatosProveedor($idProveedor,$nombre, $apellido, $documento, $correo, $cuenta, $direccion, $estado);


}

?>