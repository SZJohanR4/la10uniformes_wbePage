
<!DOCTYPE html>


<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       
        <meta charset="UTF-8">
        <title>Proveedor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="..\Componentes\estilo.css" rel="stylesheet">

        
        
    </head>
    <body>
 
        <?php
        include '../../Clases/dataBase.php';
        include '../../Clases/Proveedor.php';
        $documentoProveedor = $_GET['doc'];
    
        $db = new dataBase();
        $db->conectar();

        if($documentoProveedor!="") {
            
            $consulta1 = mysql_query("SELECT `idProveedor`, `nombre`, `apellido`, `documento`, `email`, `contrasena`, "
                    . "`nroCuentaBancaria`, `direccion`, `estado` FROM `proveedor` WHERE `documento`=$documentoProveedor");
            while ($row = mysql_fetch_row($consulta1)) {
                $idProveedor = $row[0];
                $nombre = $row[1];
                $apellido = $row[2];

                $email = $row[4];
                $password = $row[5];
                $nroCuentaBancaria = $row[6];
                $direccion = $row[7];
                $estado = $row[8];
            }
        }else{
            $id=$_GET['id'];
             $consulta1 = mysql_query("SELECT `idProveedor`, `nombre`, `apellido`, `documento`, `email`, `contrasena`, "
                    . "`nroCuentaBancaria`, `direccion`, `estado` FROM `proveedor` WHERE `idProveedor`=$id");
             while ($row = mysql_fetch_row($consulta1)) {
                 $idProveedor = $row[0];
                $nombre = $row[1];
                $apellido = $row[2];
                $documentoProveedor=$row[3];
                $email = $row[4];
                $password = $row[5];
                $nroCuentaBancaria = $row[6];
                $direccion = $row[7];
                $estado = $row[8];
             }
             
        }
        $proveedor = new Proveedor();
        $proveedor->construct($idProveedor, $nombre, $apellido, $documentoProveedor, $email, $password, $nroCuentaBancaria, $direccion, $estado)
        ?> 
        
       
        
        <div id="header">

        <ul class ="nav">
            

            <li><a href="solicitudesReserva.php?id=<?php echo$idProveedor; ?>">VER RESERVAS</a>
           
                </li>
                <li><a href="uniformesPublicados.php?id=<?php echo$idProveedor; ?>">UNIFORMES</a></li>
            <li><a href="solicitarSuscripcion.php">SUBSCRIPCION</a></li>
              <li><a href="publicidadAsignada.php?id=<?php echo$idProveedor; ?>">PUBLICIDAD</a></li>
              <li><a href="../../Chats/Proveedor.php">CONTACTAR</a></li>
              <li><a href="">SALIR</a></li>
              


      
        </ul>
    </div>
        
     
        

    </body>
</html>