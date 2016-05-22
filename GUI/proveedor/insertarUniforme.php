
<html>
    <head>
        <meta charset="UTF-8">
        <title> Formulario </title>
    <link type="text/css" href="../Componentes/CSS/Estilo2.css" rel="stylesheet"><!estilo principal>
    <script type="text/javascript" src="../Componentes/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="../Componentes/js/efecto.js"></script>
</head>
<body>

    <div id="web">
        <a href="eliminarUniformes.php" target="_blank">Eliminar uniformes</a>
        <a href="insertarUniforme.php" target="_blank">Insertar Uniforme</a>
        <a href="salirSistema.php" target="_blank">Salir Sistema</a>
        <header>
           Proveedor



        </header>

        <div id="espacio">

        </div>
        <nav>
            <div id="nombreFormulario2">
                Clientes

            </div>

        </nav>

        <div id="paso1">
            <br>
            <form  method="post" action="../../Clases/control.php" enctype="multipart/form-data">
                <fieldset>

                    <legend>Datos Cliente</legend>
                    <table>
                        <tr>

                            <td><label for="idUniform">Id Uniforme: </label> <span>*</span> </td>
                            <td> <input type="text" id="idUniform" name="idUniform" required ></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="equipo">Equipo: </label> <span>*</span></td>
                            <td> <input type="text" id="equipo" name="equipo" required ></td>
                        </tr>
                        <tr>
                            <td> <label for="categoria">Categoria: </label><span>*</span> </td>
                            <td> <input type="text" id="categoria" name="categoria" required ></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="Talla">Talla: </label><span>*</span> </td>
                            <td> <input type="text" id="Talla" name="Talla" required ></td>

                        </tr>
                        <tr>
                            <td> <label for="precio">Precio : </label><span>*</span> </td>
                            <td> <input type="text" id="precio" name="precio" required ></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td><label for="tela">Tela: </label> <span>*</span></td>
                            <td><input type="text" name="tela" required ></td>

                        </tr>
                        <tr>
                            <td><label for="descuento">Descuento : </label><span>*</span></td>
                            <td><input type="text" name= "descuento"  required /></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td><label for="replica">Replica : </label><span>*</span></td>
                            <td><input type="text" name= "replica"  required /></td>
                        </tr>
                        <tr>
                            <td><label for="clasificacion">Clasificacion : </label><span>*</span></td>
                            <td><input type="text" name= "clasificacion"  required /></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td><label for="Descripcion">Descripcion: </label></td>
                            <td><textarea name="Descripcion" rows="2" cols="20">Escriba sus Comentarios....
                                </textarea></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="Proveedor">proveedor : </label> <span>*</span></td>
                            <td> 
                                <?php
                                include("../../conexion.php");

                                $link = Conectarse();

                                $result = mysql_query("SELECT idProveedor FROM proveedor ;", $link);

                                echo "<select name='selectproveedor'>";
                                while ($fila = mysql_fetch_array($result)) {
                                    echo "<option value='" . $fila['idProveedor'] . "'>" . $fila['idProveedor'] . "</option>";
                                }
                                echo "</select>";
                                ?> 
                                </select></td>


                        </tr>
                    </table>
                </fieldset>
                <br>
                <input type="submit" name="enviarUniforme" value="Enviar Cliente">  

            </form>
        </div>

        <div id="paso2">
            <br>
            <form  method="post" action="../../Clases/control.php" enctype="multipart/form-data">
                <fieldset> 

                    <legend> Imagen</legend>
                    <table  >
                        <tr>
                            <td><label for="idimagen">Id imagen: </label><span>*</span>  </td>
                            <td> <input type="text" id="idimagen" name="idimagen" required placeholder="Id imagen"></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="propietario">Proveedor: </label> <span>*</span></td>
                            <td> 
                                <?php
                                $result = mysql_query("SELECT idProveedor FROM proveedor ;", $link);

                                echo "<select name='selectproveedor'>";
                                while ($fila = mysql_fetch_array($result)) {
                                    echo "<option value='" . $fila['idProveedor'] . "'>" . $fila['idProveedor'] . "</option>";
                                }
                                echo "</select>";
                                ?> 
                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="Iduniforme">Id Uniforme: </label><span>*</span> </td>
                            <td> 
    <?php
$result = mysql_query("SELECT idUniforme FROM uniformes ;", $link);

echo "<select name='select3'>";
while ($fila = mysql_fetch_array($result)) {
    echo "<option value='" . $fila['idUniforme'] . "'>" . $fila['idUniforme'] . "</option>";
}
echo "</select>";
?> 
                                </select></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td><label for="tipo">Tipo : : </label><span>*</span></td>
                            <td><input type="text" name= "tipo"  required /></td>



                        </tr>
                        <tr>


                            <td><label for="Descripcion">Descripcion: </label></td>
                            <td><textarea name="Descripcion" rows="2" cols="20">Escriba sus Comentarios....
                                </textarea></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td><label for="imagen">Fotografia: </label><span>*</span></td>
                            <td><input name="imagen" id="imagen" type="file"  required  /></td>

                        </tr>
                    </table>

                </fieldset>
                <br>
                <input type="submit" name="enviarImagen" value="Enviar Imagen">  

            </form>


        </div>

        <input type="submit" name="next" id="next" value="Next"> 

        <input type="submit" name="back" id="back" value="Back"> 



    </div>

</body>
</html>
