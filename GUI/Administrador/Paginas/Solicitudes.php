<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    <link type="text/css" href="..\..\Componentes\css\estiloFormularios.css" rel="stylesheet"><!estilo principal>
    <title>1 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../Componentes/boostrapCss/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <br>
    <br>
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
    <div id="wrapper" style="color: white">

        <!-- Navigation -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabla Solicitudes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="color: black">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>idSolicitud</th>
                                            <th>idProveedor</th>
                                            <th>Estado de Pago</th>
                                            <th>Fecha de Solicitud</th>
                                            <th>Accion</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("../../../Clases/conexion.php");
                                        

                                        $link = Conectarse();

                                        $resulta = mysql_query("SELECT * FROM peticiones ;", $link);


                                        while ($row = mysql_fetch_row($resulta)) {
                                            $consul = $row[1];
                                            $result = mysql_query("select * from peticiones where idPeticion= " . $consul . ";");


                                            while ($fila = mysql_fetch_array($result)) {
                                                echo "<tr class='even gradeC'>";

                                                echo"<td>" . $fila[0] . "</td>";
                                                echo"<td>" . $fila[1] . "</td>";
                                                echo"<td>" . $fila[2] . "</td>";
                                                echo"<td>" . $fila[3] . "</td>";
                                                echo"<td><a href='../../../Clases/ControlSubscripcion.php?id=" . $fila[1] . "'>Subscribir</a></td>";


                                                echo "</tr>";
                                            }
                                        }
                                        ?> 

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->


    <!--         Page-Level Demo Scripts - Tables - Use for reference 
            <script type="text/javascript" src="Componentes_editar/js/jquery.js"></script>
            <script type="text/javascript" src="Componentes_editar/js/jquery.simplemodal.js"></script>
            <script type="text/javascript" src="Componentes_editar/js/contact.js"></script>-->

    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>
