<html>
    <head>
        <title>Editar</title>
        <meta charset="utf-8">
        <link href="../../Componentes/Componentes_editar/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../Componentes/Componentes_editar/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="../../Componentes/Componentes_editar/css/estiloEditar.css" type="text/css" rel="stylesheet">
        <link href="../../Componentes/boostrapCss/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="../../Componentes/Componentes_editar/js/efecto_editar.js"></script>
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


        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Inicio.php">LA10Uniformes</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="Inicio.php">Inicio</a>
                        </li>
                        <li>
                            <a href="login.php">Salir</a>
                        </li>
                        <li>
                            <a href="login.php">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <?php
        $identificador = $_GET['id'];
        ?> 
        <BR>
        <br>
        <br>
        <div id="web">
            <header>
                PROVEEDOR
            </header>

            <div id="left">

            </div>




            <?php
            include("../../../Clases/conexion.php");
            $link = Conectarse();
            $result = mysql_query("select * from proveedor where idProveedor= " . $identificador . ";");

            while ($fila = mysql_fetch_array($result)) {

                $output = " <div id='right'>
                <form method='post' action='../../../Clases/ControlProveedor.php' enctype='multipart/form-data'>
                    <div id='lefti'>"
                        . "<label for='id'>idProveedor:    </label>&nbsp &nbsp<input type='text' value='" . $fila[0] . "' name='id' id='id' class='formulario' disabled='disabled' required><br/>
                        <label for='Nombre'>Nombre:  </label>&nbsp &nbsp<input type='text' value='" . $fila[1] . "' name='Nombre' id='Nombre' class='formulario' disabled='disabled' required><br/>
                       <label for='Apellido'>Apellido:   </label>&nbsp &nbsp<input type='text' value='" . $fila[2] . "' name='Apellido' id='Apellido' class='formulario' disabled='disabled' required><br/>
                        <label for='Documento'>Documento:  </label>&nbsp &nbsp<input type='text' value='" . $fila[3] . "' name='Documento' id='Documento' class='formulario' disabled='disabled' required/><br/>
                    </div>
                    
                    <label for='correo'>Correo:  </label>&nbsp &nbsp<input type='email' value='" . $fila[4] . "' name='correo' id='correo' class='formulario' disabled='disabled' required/><br/>
                    <div id='righti'>
                   
                        <label for='nroCuentaBancaria'>CuentaBancaria:       </label>&nbsp &nbsp <input type='text' value='" . $fila[6] . "' id='nroCuentaBancaria' name='nroCuentaBancaria' class='formulario' disabled='disabled' required='required'><br/>
<label for='direccion'>direccion:  </label>&nbsp &nbsp<input type='text' value='" . $fila[7] . "' id='direccion' name='direccion' class='formulario' disabled='disabled' required='required'><br/>                        
               <label for='estado'>estado:  </label>&nbsp &nbsp <input type='text' value='" . $fila[8] . "' id='estado' name='estado' class='formulario' disabled='disabled' required='required'> <br/>      
<br><br><br><input type=submit id=actualizar name=actualizar value=" . $fila[0] . ".ACTUALIZAR  class=envios disabled=disabled/>
</div>";
            }
            echo $output;
            ?>

            
        </form>
        <input type="submit" onclick="editar()"name="editarcliente" value="Editar Cliente" class="envios"/>

    </div>





</body>
</html>
