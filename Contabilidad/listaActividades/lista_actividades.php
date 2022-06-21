<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Gracoil</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTable -->
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../static/css/style2.css" />
    <!-- Font Awesome JS -->
    <script defer src="https://kit.fontawesome.com/454f438745.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h5>MGS</h5>
                <br />
                <h6>Steve Jobs</h6>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="#Dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboard</a>
                    <ul class="collapse list-unstyled" id="Dashboard">
                        <li>
                            <a href="/Dasboard/dasboard_gen.html">Dashboard General</a>
                        </li>
                        <li>
                            <a href="#">Dashboard Gracoil</a>
                        </li>
                        <li>
                            <a href="#">Dashboard Inter</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#datoscliente" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Datos Clientes</a>
                    <ul class="collapse list-unstyled" id="datoscliente">
                        <li>
                            <a href="#">Gracoil</a>
                        </li>
                        <li>
                            <a href="#">Inter</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#desccliente" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-money-bill"></i> Descuentos Clientes</a>
                    <ul class="collapse list-unstyled" id="desccliente">
                        <li>
                            <a href="#">Gracoil</a>
                        </li>
                        <li>
                            <a href="#">Inter</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#estservicio" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-truck-moving"></i> Estación servicios</a>
                    <ul class="collapse list-unstyled" id="estservicio">
                        <li>
                            <a href="#">Gracoil</a>
                        </li>
                        <li>
                            <a href="#">Inter</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-inverse fixed-top" style="background-color: #3c3c3c">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left" style="color: rgb(255, 255, 255)"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link link-nav-top" href="../../home.html" style="color: white; margin: 0px 0px 0px 5px">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-nav-top-active" href="../../Contabilidad/listaActividades/lista_actividades.php" style="color: white; margin: 0px 0px 0px 5px">Actividades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-nav-top" href="../../Contabilidad/listaActividades/lista_departamentos.php" style="color: white; margin: 0px 0px 0px 5px">Departamentos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid" style="margin-top: 50px; background-color: rgb(255, 255, 255); padding: 1rem; border-radius: 8px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.634);">
                <div class="row">
                    <div class="col col-sm-12" style="display: flex;">
                        <div>
                            <p>Contabilidad/Lista de Actividades/lista_actividades</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12">
                                <div>
                                    <a class="btn  btn-success btn-sm" href="../listaActividades/create_actividad.php"><i class="fa-solid fa-plus"></i> Crear</a>
                                </div>
                                <div>
                                    <h2 style="text-align: center;">Lista de Actividades</h2>
                                </div>
                                <!-- botones para ocultar tablas -->

                                <!-- contenido de Gracoil -->
                                <div>
                                    <table class="table table-hover table-bordered table-sm estilo_tabla" id="tableListaActividades">
                                        <thead>
                                            <tr>
                                                <th>Actividad</th>
                                                <th>Fecha limite</th>
                                                <th>Avance</th>
                                                <th>Presentación</th>
                                                <th>Revisado</th>
                                                <th>Compartido</th>
                                                <th>Departamento</th>
                                                <th>Observaciones</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../../includes/conexionG.php");
                                            $consulta = "SELECT * FROM actividades_contador;";
                                            $datos = mysqli_query($enlace, $consulta);
                                            while ($dato = mysqli_fetch_assoc($datos)) {


                                            ?>
                                                <tr>
                                                    <td><?php echo $dato['acti']; ?></td>
                                                    <td><?php echo $dato['fecha_lim']; ?></td>
                                                    <td>
                                                        <div class="progress">
                                                            <?php
                                                            if (intval($dato['avance']) < 25) {
                                                                $color = 'danger';
                                                            } elseif (intval($dato['avance']) >= 25 && intval($dato['avance']) <= 99) {
                                                                $color = 'warning';
                                                            } else {
                                                                $color = 'success';
                                                            }
                                                            ?>
                                                            <div class="progress-bar   bg-<?php echo $color; ?>" role="progressbar" style="width: <?php echo $dato['avance']; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $dato['avance'] . '%'; ?></div>
                                                        </div>

                                                    </td>
                                                    <td style="text-align: center; ">
                                                        <?php
                                                        date_default_timezone_set('america/mexico_city');
                                                        if ($dato['present'] == '') {
                                                            echo '';
                                                        } elseif (file_exists('./evidencias/' . $dato['present'])) {
                                                            echo '<a style="width: 100%; font-size: 9px;" class="btn btn-sm bg-secondary text-white" href="./evidencias/' . $dato["present"] . '" title="Ultima modificacion fue: ' . date("y-m-s H:i:s.", filemtime("./evidencias/" . $dato['present'])) . '" "><i class="fa fa-download"></i> ' . $dato['present'] . ' </a>';
                                                        } else {
                                                            echo 'Fichero no encontrado';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $dato['revisado']; ?></td>
                                                    <td><?php echo $dato['comp']; ?></td>
                                                    <td><?php echo $dato['dept']; ?></td>
                                                    <td><?php echo $dato['obser']; ?></td>
                                                    <td style="display: flex; justify-content: center;   align-items: center;">
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-sm" title="Editar actvidad:  <?php echo $dato['acti']; ?>" onclick="editar('<?php echo $dato['id_ac']; ?>')"><i class="fas fa-edit"></i></button>
                                                            <!-- <button type="button" class="btn btn-danger btn-sm" title="Cerrar actvidad:  <?php echo $dato['acti']; ?>" onclick="generar_pdf('<?php echo $dato['id_ac']; ?>','<?php echo $dato['id_ac']; ?>')"><i class="fas fa-times"></i></button> -->
                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php }
                                            mysqli_close($enlace);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- termina el contenido de lista de actividades -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script async src="../../static/js/Contabilidad/cont_list_actividades.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <!-- Links para dataTable -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.24/api/average().js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
</body>

</html>