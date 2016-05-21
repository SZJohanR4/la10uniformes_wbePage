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
            <title>Solicitudes</title>
        </head>
        <body>
            <header>
                <h1>La 10 Uniformes</h1>
                <nav><ul>
                        <li><a href="#">Inicio</a></li>
                    </ul></nav>
            </header>

            <div id="web">
 <?php
 include '../../Clases/Proveedor.php';
 
 $P=new Proveedor();
 $a=$P->consultarReservas();
 
 
 
 
//include '../../Base_Datos/dataBase.php';
//
//$db=new dataBase();
//$db->conectar();
//
// $idUniformesReservados= mysql_query("SELECT `idUniforme` FROM `reserva` WHERE `idProveedor`=1");
// $rutaImg=  mysql_query("SELECT   `imagen` FROM `imagenes` WHERE `idUniforme`=$idUniformesReservados");
//echo $idUniformesReservados." holalalalal";
 
 
 
//                <div id="contenido">
//                    <div id="imgCampo">
//                       
//                       
//
//                        </div>;
//                    <div id="info">
//
//                    </div>
//                </div>
////
//            </div>
 ?>





        </body>
    </html>
