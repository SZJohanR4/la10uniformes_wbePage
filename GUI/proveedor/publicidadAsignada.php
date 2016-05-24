<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <<head>
        <meta charset="UTF-8">
        <link href="../../css/Proveedor_Style_Johan.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mi publicidad</title>

    </head>

    <header>
        <h1>La 10 Uniformes</h1>
        <nav><ul>
                <li><a href="indexproveedor.php">Inicio</a></li>
            </ul></nav>
    </header>
    <body>
        <?php
        $idProveedor = $_GET['id'];
        include'../../Clases/Publicidad.php';

        $datos = array();
        $publicidad = new Publicidad();
        $datos = $publicidad->consultarPulbicidad($idProveedor);
       
        
        ?>


        <h2>
            <?php
            echo $datos[1];
            ?>
        </h2>


        <div id="imagenComentario">

            <?php
            echo '<IMG src="' . $datos[0] . '">';
            ?>
        </div>
        
        <div id="comentario">
            <?php
            echo $datos[2];
            ?>
        </div>


        <?php
        // put your code here
        ?>
    </body>
</html>
