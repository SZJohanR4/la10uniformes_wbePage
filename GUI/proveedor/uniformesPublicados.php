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
                          <a href="eliminarUniformes.php" target="_blank">Eliminar uniformes</a>
        <a href="insertarUniforme.php" target="_blank">Insertar Uniforme</a>
        <a href="salirSistema.php" target="_blank">Salir Sistema</a>
        <a href="insertarProveedores.php" target="_blank">Insertar Proveedore</a>
        <a href="uniformesPublicados.php" target="_blank">Consultar uniformes</a>
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
