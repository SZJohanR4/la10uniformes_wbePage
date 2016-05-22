<html>
    <head>
        <title>Editar</title>
        
        <meta charset="utf-8">
        <link href="Componentes_editar/css/bootstrap.min.css" rel="stylesheet">
        <link href="Componentes_editar/css/dataTables.bootstrap.css" rel="stylesheet">
         
        <link href="Componentes_editar/css/estiloEditar.css" type="text/css" rel="stylesheet">
        <?php $estilo = $_GET['estilo'];
                        
    echo"<link type='text/css' href=$estilo rel='stylesheet'>";
           
            ?> 

        <script type="text/javascript" src="Componentes_editar/js/efecto_editar.js"></script>
        <script src="Componentes_editar/js/jquery.min.js"></script>
        <script src="Componentes_editar/js/jquery.dataTables.min.js"></script>
        <script src="Componentes_editar/js/dataTables.bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>
       

    </head>
    <body>
       

            <?php
            $identificador = $_GET['id'];
            ?> 

            
    <div id="activos">
        
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr><td>Imagen</td><td>Equipo</td><td>Categoria</td><td>Talla</td><td>Precio</td><td>Tela</td><td>Descuento</td><td>Replica</td><td>clasificacion</td><td>descripcion</td></tr>
       
            </thead>

            <?php
            echo "<center><table border='1'>\n";
        echo "<tr><td>Imagen</td><td>Equipo</td><td>Categoria</td><td>Talla</td><td>Precio</td><td>Tela</td><td>Descuento</td><td>Replica</td><td>clasificacion</td><td>descripcion</td></tr>\n";
        $consulta1 = mysql_query("SELECT `idUniforme`, `equipo`, `categoria`, `tallas`, `precio`, `tela`, `descuento`, `replica_original`, `clasificacion`, `descripcion` FROM `uniformes`");
        while ($row = mysql_fetch_row($consulta1)) {
            $idUniforme = $row[0];
            $consulta2 = mysql_query("SELECT `imagen` FROM `imagenes` WHERE `idUniforme`=$idUniforme;");
            while ($row2 = mysql_fetch_row($consulta2)) {
                
                echo"<tr><td><img src='$row2[0]'></td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td></tr>";
            }
        }
        echo"</center></table>";
        
        
             $consulta1 = mysql_query("SELECT `idUniforme`, `equipo`, `categoria`, `tallas`, `precio`, `tela`, `descuento`, `replica_original`, `clasificacion`, `descripcion` FROM `uniformes`");
       
            while ($filas = mysql_fetch_array($consulta1)) {
                $idUniforme = $row[0];
                 echo"<tr>";
              
                echo"<form method='post' action='Control.php?id=" . $filas[0] . "' enctype='multipart/form-data'>";
                
                echo"<td> <table>
                     <tr>";
                     $consulta2 = mysql_query("SELECT `imagen` FROM `imagenes` WHERE `idUniforme`=$idUniforme;");
            while ($row2 = mysql_fetch_row($consulta2)) {
                
                echo"<tr><td><img src='$row2[0]'></td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td></tr>";
            }
            echo"<td>$filas[1]</td>
           </tr></table></td>";
                echo"<td> <table>
                       <tr>
            <td>$filas[0]</td>
           </tr></table></td>";
                echo"<td> <table>
                       <tr>
            <td>$filas[2]</td><tr>
                <td>";
                $resultados = mysql_query("SELECT nombre FROM tipoactivos ;", $link);

                echo "<select name='TA' required placeholder='Tipo Activo'id='TA' class='formulario' >";
                 echo "<option value=''selected></option>";
                while ($fil = mysql_fetch_array($resultados)) {
                    echo "<option value='" . $fil['nombre'] . "'>" . $fil['nombre'] . "</option>";
                }
                echo "</select></tr></td>
           </tr></table></td>";
                echo"<td><table>
                       <tr>
            <td>$filas[3]</td><tr>
                <td>";
                $resultados2 = mysql_query("SELECT nombre FROM categorias ;", $link);

                echo "<select name='CATE' required placeholder='Categoria'id='CATE' class='formulario' >";
                echo "<option value=''selected></option>selected";
                while ($fil = mysql_fetch_array($resultados2)) {
                     
                    echo "<option value='" . $fil['nombre'] . "'>" . $fil['nombre'] . "</option>";
                }
                echo "</select></tr></td>
           </tr></table></td>";

                echo"<td> <table><tr><td>
                       <input type='text' value='" . $filas[4] . "' id='modelo' name='modelo' class='formulario'  required='required'></td></tr></table>
                         </td>";
                echo"<td> <table><tr> <td>
                       <input type='text' value='" . $filas[5] . "' id='marca' name='marca' class='formulario'  required='required'></td></tr></table>
                         </td>";
                echo"<td><textarea id='textarea' name='textarea' rows='2' cols='12' class='formulario'  required='required'>$filas[6]
                                </textarea></td> ";
                echo"<td><textarea id='textarea2' name='textarea2' rows='2' cols='12' class='formulario' required='required'>$filas[7]
                                </textarea></td> ";
             
                echo"<td> <input type='submit' id='submit' name='actualizarAc' value='Enviar'></td>";


                echo "</tr>";
                echo"</form>";
              
                
            
           
               
                      
            }
            ?>




        </table>
    </div>




</body>
</html>
