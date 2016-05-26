<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../css/Proveedor_Style_Johan.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suscripcion</title>

    </head>
    <body>       
        <header>
            <h1>La 10 Uniformes</h1>
            <nav><ul>
                    <?php
                $idProveedor = $_GET['id'];
                $doc="";
                ?>
                <li><a href="indexproveedor.php?id=<?php echo$idProveedor."&doc=".$doc;?>">Inicio</a></li>
                </ul></nav>
        </header>

        <div id="web">

            <form  method="POST" action="../../Clases/control.php" enctype="multipart/form-data">
                <fieldset>
                    <legend>Datos Proveedor</legend>                        
                    <div id="izq">
                        <div id="id"> <label for="nombreI">ID:<span>*</span></label><input type="text" id="idI" name="idI" required>  </div>   
                        <div id="titulo"> <label for="cedulaI">Titulo:<span>*</span></label> <input type="text" id="tituloI" name="tituloI" required> </div>
                        <div id="descripcion"> <label for="descripcionI">Descripcion:<span>*</span></label> <textarea id="descripcionI" name="descripcionI" placeholder="Escriba las caracteristicas"></textarea> </div>                        
                    </div>  


                    <div id="der">
                        <div id="fotografia"><label for="fotografia">Fotografia:<span>*</span></label><input type="file" id="fotografia" name="fotografia" accept="image/gif , image/jpeg , image/png" required></div>                     
                    </div>


                </fieldset>
                <input type="submit" name="enviarSolicitudPublicidad" value="Enviar Solicitud" id="enviarSolicitudPublicidad" class="boton">
            </form>          

        </div>
    </body>
</html>
