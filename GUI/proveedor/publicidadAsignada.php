
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../css/Proveedor_Style_Johan.css" type="text/css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mi publicidad</title>

    </head>

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
    <body>
        <?php
        $idProveedor = $_GET['id'];
        include'../../Clases/Publicidad.php';

        $datos = array();
        $publicidad = new Publicidad();
        $datos = $publicidad->consultarPulbicidad($idProveedor);
        if($datos==NULL){
            $datos[1]="no hay publicidad";
            $datos[2]=" ";
            $datos[0]=" ";
                    
        }
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
