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
                <h1>La 10 Uniformes</h1>
                <nav><ul>
                        <li><a href="indexproveedor.php">Inicio</a></li>
                    </ul></nav>
            </header>

            <div id="web">
               
                    <?php
                    include '../../Clases/Proveedor.php';
                    $datos = array();
                    $p = new Proveedor();
                    $p->consultarUniformesPublicados();
                    ?>

                </div>
    </body>
</html>
