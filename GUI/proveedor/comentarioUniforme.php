<DOCTYPE html>
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
        <title>Uniformes</title>

    </head>
    <header>
        <h1>La 10 Uniformes</h1>
        <nav><ul>
                <?php
                $idProveedor = $_GET['id'];
                $doc = "";
                ?>
                <li><a href="indexproveedor.php?id=<?php echo$idProveedor . "&doc=" . $doc; ?>">Inicio</a></li>
            </ul></nav>
    </header>
    <div id="contenidoImagenes">
        <?php
        $idUniforme = $_GET['idUnifor'];
        include '../../Clases/Calificacion.php';
        $verComentario = new Calificacion();
        $datos = array();
        $datos = $verComentario->verComentarios($idUniforme);
        ?>
    </div>

    <div id="comentario">
        <?php
        echo $datos[1];
        ?>

    </div>


    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>