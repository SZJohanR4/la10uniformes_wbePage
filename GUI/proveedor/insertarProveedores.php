
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
        <a href="insertarProveedores.php" target="_blank">Insertar Proveedore</a>
        <a href="uniformesPublicados.php" target="_blank">Consultar uniformes Publicados</a>
        <a href="consultarUniformes.php" target="_blank">Consultar uniformes </a>
        <a href="../../Chats/Proveedor.php" target="_blank">Chat</a>
        
        <header>
           Proveedor



        </header>

        <div id="espacio">

        </div>
        <nav>
            <div id="nombreFormulario2">
                Insertar Proveedores

            </div>

        </nav>

        <div id="paso1">
            <br>
            <form  method="post" action="../../Clases/control.php" enctype="multipart/form-data">
                <fieldset>

                    <legend>Datos Cliente</legend>
                    <table>
                        <tr>

                            <td><label for="idProveedor">Idproveedor: </label> <span>*</span> </td>
                            <td> <input type="text" id="idProveedor" name="idProveedor" required ></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="nombre">Nombre: </label> <span>*</span></td>
                            <td> <input type="text" id="nombre" name="nombre" required ></td>
                        </tr>
                        <tr>
                            <td> <label for="apellido">Apellido: </label><span>*</span> </td>
                            <td> <input type="text" id="apellido" name="apellido" required ></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td> <label for="documento">Documento : </label><span>*</span> </td>
                            <td> <input type="text" id="documento" name="documento" required ></td>

                        </tr>
                        <tr>
                           <td><label for="correo">Correo Electronico: </label> <span>*</span></td>
                            <td><input type="email" name="correo" required ></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td><label for="contrasena">Contrasena: </label> <span>*</span></td>
                            <td><input type="text" name="contrasena" required ></td>

                        </tr>
                        <tr>
                            <td><label for="cuenta">Nro Cuenta bancaria : </label><span>*</span></td>
                            <td><input type="text" name= "cuenta"  required /></td>
                            <td><pre style='display:inline'>&#09;</pre></td>
                            <td><label for="direccion">Direccion : </label><span>*</span></td>
                            <td><input type="text" name= "direccion"  required /></td>
                        </tr>
                        <tr>
                            <td><label for="estado">Estado : </label><span>*</span></td>
                            <td><input type="text" name= "estado"  required /></td>
                            
                                </tr>
                    </table>
                </fieldset>
                <br>
                <input type="submit" name="enviarProveedor" value="Enviar Proveedor">  

            </form>
        </div>

        
    </div>

</body>
</html>
