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
        $this->idProveedor = 1;//$idProveedor;
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
        include 'dataBase.php';
   
        $db = new dataBase();
        $db->conectar();
        echo "<center><table border='1'>\n";      
        echo "<tr><td>Imagen</td><td>servicio reservado</td><td>nombre usuario</td><td>Costo</td></tr>\n";
        $consulta1 = mysql_query("SELECT `idReserva`, `fecha`, `idUniforme`, `idUsuario`, `precio`, `cantidad` FROM `reserva` WHERE `idProveedor`=1");
        while ($row = mysql_fetch_row($consulta1)) {
            $idUniforme = $row[2];
            $idUsuario = $row[3];
            $consulta2 = mysql_query("SELECT `imagen` FROM `imagenes` WHERE `idUniforme`=$idUniforme;");
            while ($row2 = mysql_fetch_row($consulta2)) {

                $consulta3 = mysql_query("select `nombre` from usuarios where idUsuario=$idUsuario ");
                while ($row3 = mysql_fetch_row($consulta3)) {
                    echo"<tr><td><img src='$row2[0]'></td><td>$row[1]</td><td>$row3[0]</td><td>$row[4]</td></tr>";
                    
                }
            }
        }
        echo"</center></table>";
    }

    function consultarUniformesPublicados() {
        include 'dataBase.php';
   
        $db = new dataBase();
        $db->conectar();
        echo "<center><table border='1'>\n";
         echo "<tr><td>Proveedor</td><td>Imagen</td><td>Equipo</td><td>Categoria</td><td>Talla</td><td>Precio</td><td>Tela</td><td>Descuento</td><td>Replica</td><td>clasificacion</td><td>descripcion</td></tr>\n";
       $consulta1 = mysql_query("SELECT `idUniforme`, `equipo`, `categoria`, `tallas`, `precio`, `tela`, `descuento`, `replica_original`, `clasificacion`, `descripcion` FROM `uniformes` WHERE `idProveedor`=1");
        while ($row = mysql_fetch_row($consulta1)) {
            $idUniforme = $row[0];
            $consulta2 = mysql_query("SELECT `imagen` FROM `imagenes` WHERE `idUniforme`=$idUniforme;");
            while ($row2 = mysql_fetch_row($consulta2)) {
               echo"<tr><td>Proveedor 1</td><a href='../GUI/proveedor/comentarioUniforme.php?id=" . $row[0] . "'><td><img src='$row2[0]'></a></td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td></tr>";
            }
        }
        echo"</center></table>";
    }
    function consultarUniformes() {
        include 'dataBase.php';
        $sc = new dataBase();
        $sc->conectar();
        echo "<center><table border='1'>\n";
        echo "<tr><td>Imagen</td><td>Equipo</td><td>Categoria</td><td>Talla</td><td>Precio</td><td>Tela</td><td>Descuento</td><td>Replica</td><td>clasificacion</td><td>descripcion</td></tr>\n";
        $consulta1 = mysql_query("SELECT `idUniforme`, `equipo`, `categoria`, `tallas`, `precio`, `tela`, `descuento`, `replica_original`, `clasificacion`, `descripcion` FROM `uniformes`");
        while ($row = mysql_fetch_row($consulta1)) {
            $idUniforme = $row[0];
            $consulta2 = mysql_query("SELECT `imagen` FROM `imagenes` WHERE `idUniforme`=$idUniforme;");
            while ($row2 = mysql_fetch_row($consulta2)) {
                
                echo"<tr><td><img src='$row2[0]'></td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td></tr>";
            }
        }
        echo"</center></table>";
    }
    
    
    function verComentarios($idUniforme,$idProveedor){
        //que lleguen los id pa (y)
    }
    function insertarProveedor($idProveedor,$nombre,$apellido,$documento,$email,$contraseña,$cuenta,$direccion,$estado){
        include '../Clases/dataBase.php';
        $db = new dataBase();
        $db->conectar();
        $db->insertarProveedor($idProveedor,$nombre,$apellido,$documento,$email,$contraseña,$cuenta,$direccion,$estado);
        
    }

}
