
<!DOCTYPE html>


<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <?php 
        include '../../Clases/dataBase.php';
        include '../../Clases/Proveedor.php';
        $documentoProveedor=$_GET['doc'];
        $db=new dataBase();
        $db->conectar();
        
        $consulta1=  mysql_query("SELECT `idProveedor`, `nombre`, `apellido`, `documento`, `email`, `password`, "
                . "`nroCuentaBancaria`, `direccion`, `estado` FROM `proveedor` WHERE `documento`=$documentoProveedor");
        while ($row = mysql_fetch_row($consulta1)) {
            $idProveedor=$row[0];
            $nombre=$row[1];
            $apellido=$row[2];
            
            $email=$row[4];
            $password=$row[5];
            $nroCuentaBancaria=$row[6];
            $direccion=$row[7];   
            $estado=$row[8];
        }
        
        $proveedor=new Proveedor();
        $proveedor->construct($idProveedor, $nombre, $apellido, $documentoProveedor, $email, $password, $nroCuentaBancaria, $direccion, $estado)
 
        ?> 
        <a href="solicitudesReserva.php">verReservas</a>
        <a href="uniformesPublicados.php">consultarUniformesPublicados</a>
        <a href="solicitarSuscripcion.php">suscripcion</a>
        <a href="comentarioUniforme.php">ver Comentarios</a>
        <a href="publicidadAsignada.php">ver publicidadAsignada</a>

    </body>
</html>