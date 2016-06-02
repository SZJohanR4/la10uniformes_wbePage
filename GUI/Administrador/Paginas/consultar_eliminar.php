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
            <link href="../../../css/Proveedor_Style_Johan.css" type="text/css" rel="stylesheet">
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
                 include '../../../Clases/dataBase.php';
        $sc = new dataBase();
        $sc->conectar();
        
        echo "<center><table border='1'>\n";
        echo "<tr><td>Imagen</td><td>Id Unifore</td></tr>\n";
        $consulta1 = mysql_query("SELECT `idUniforme`, `equipo`, `categoria`, `tallas`, `precio`, `tela`, `descuento`, `replica_original`, `clasificacion`, `descripcion` FROM `uniformes`");
        while ($row = mysql_fetch_row($consulta1)) {
            $idUniforme = $row[0];
            $consulta2 = mysql_query("SELECT `imagen` FROM `imagenes` WHERE `idUniforme`=$idUniforme;");
            while ($row2 = mysql_fetch_row($consulta2)) {
                
                echo"<tr><td><img src='../$row2[0]'></td><td>$row[0]</td></tr>";
            }
        }
        echo"</center></table>";
               
                    
                   
                    ?>
                <form  method="post" action="../../../Clases/control.php" enctype="multipart/form-data">
                <fieldset>

                    <legend>Eliminar Uniforme</legend>
                    <table>
                     
                        <tr>
                           
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="Proveedor">Uniforme: </label> <span>*</span></td>
                            <td> 
                                <?php
                                include("../../../Clases/conexion.php");

                                $link = Conectarse();

                                $result = mysql_query("SELECT idUniforme FROM uniformes ;", $link);

                                echo "<select name='selectelmiminar'>";
                                while ($fila = mysql_fetch_array($result)) {
                                    echo "<option value='" . $fila['idUniforme'] . "'>" . $fila['idUniforme'] . "</option>";
                                }
                                echo "</select>";
                                ?> 
                                </select></td>


                        </tr>
                    </table>
                </fieldset>
                <br>
                <input type="submit" name="eliminarUniformeadmin" value="Eliminar">  

            </form>

                </div>
    </body>
</html>
