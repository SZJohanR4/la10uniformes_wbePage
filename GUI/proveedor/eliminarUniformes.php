
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

                    <legend>Eliminar Uniforme</legend>
                    <table>
                     
                        <tr>
                           
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="Proveedor">Uniforme: </label> <span>*</span></td>
                            <td> 
                                <?php
                                include("../../conexion.php");

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
                <input type="submit" name="eliminarUniforme" value="Uniforme">  

            </form>