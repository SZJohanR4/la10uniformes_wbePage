<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <head>
        <meta charset="UTF-8">
        <link href="../../css/Proveedor_Style_Johan.css" type="text/css" rel="stylesheet">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <title>Uniformes Publicados</title>
    </head>
    <body>
        <header>
            <div id="cabeza">
                <h1> La 10 Uniformes</h1>
            <br>
            <BR>
            <BR>
            
            
            <nav><ul>
                    <?php
                    $idProveedor = $_GET['id'];
                    $doc = "";
                    ?>

                    <div id="header">

                        <ul class ="nav">


                            <li><a href="indexproveedor.php?id=<?php echo$idProveedor . "&doc=" . $doc; ?>">INICIO</a> </li>
                            <li> <a href="eliminarUniformes.php" target="_blank">ELIMINAR UNIFORMES</a></li>
                            <li><a href="insertarUniforme.php" target="_blank">INSERTAR UNIFORME</a></li>
                            

                            <li>      <a href="uniformesPublicados.php" target="_blank">CONSULTAR UNIFORMES</a></li>

                            <li><a href="salirSistema.php" target="_blank">SALIR</a></li>




                        </ul>
                    </div>
                    <BR>
                    <BR>


                </ul></nav>
        </header>

        <div id="web">

            <?php
            include '../../Clases/Proveedor.php';
            $datos = array();
            $p = new Proveedor();
            $p->consultarUniformesPublicados($_GET['id']);
            ?>

        </div>
    </body>
</html>
