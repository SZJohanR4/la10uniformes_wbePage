<?php

/**
 * todo procedimiento logico de la clase proveedor
 *  aqui iran los metodos :v
 *
 * @author la10Uniformes
 */

class Proveedor {

    private $idProveedor;
    private $nombre;
    private $apellido;
    private $documento;
    private $email;
    private $contraseña;
    private $nroCuentaBancaria;
    private $direccion;
    private $estado;
   
            
    

    function construct($idProveedor, $nombre, $apellido, $documento, $email, $contraseña, $nroCuentaBancaria, $direccion, $estado) {
        $this->idProveedor = $idProveedor;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->email = $email;
        $this->contraseña = $contraseña;
        $this->nroCuentaBancaria = $nroCuentaBancaria;
        $this->direccion = $direccion;
        $this->estado = $estado;
        
    }
    
    
    

    function getIdProveedor() {
        return $this->idProveedor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getEmail() {
        return $this->email;
    }

    function getContraseña() {
        return $this->contraseña;
    }

    function getNroCuentaBancaria() {
        return $this->nroCuentaBancaria;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdProveedor($idProveedor) {
        $this->idProveedor = $idProveedor;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    function setNroCuentaBancaria($nroCuentaBancaria) {
        $this->nroCuentaBancaria = $nroCuentaBancaria;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function consultarReservas() {
        $db=new dataBase();
        $db->conectar();
       
        $idUniformesReservados= mysql_query("SELECT `idUniforme` FROM `reserva` WHERE `idProveedor`=1");
        //aqui hago los querry a la bd
        
        
        return $idUniformesReservados;//este  va a tener todos los datos de la reserva
        //y quiero mostrarlo en solicitudesReserva.php

    }

    function consultarUniformesPublicados() {
        
    }

    function mostrarProveedores() {
        
    }

}
