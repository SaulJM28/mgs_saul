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
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid" style="margin-top: 50px; background-color: rgb(255, 255, 255); padding: 1rem; border-radius: 8px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.634);">
                <div class="row">
                    <div class="col col-sm-12" style="display: flex;">
                        <div>
                            <p>Contabilidad/Formato Movimientos Extemporaneos/FormatoMoviExtemp</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12">
                                <div>
                                    <button class="btn  btn-success btn-sm" onclick="crear()"><i class="fa-solid fa-plus"></i> Crear</button>
                                </div>
                                <div>
                                    <h2 style="text-align: center;">Formato Movimientos Extemporaneos</h2>
                                </div> 
                                <?php 
                                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'success'): ?>
                                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Alerta</strong> ¡Su Formato de Movimientos Extemporaneos se ha registrado con exito!
                                    <a href="FormatoMoviExtemp.php" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
                                </div>
                                <?php else:
                                    $mensaje = ''; 
                                    ?>
                                <?php 
                                    endif;
                                
                                ?>

<?php 
                                if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'update'): ?>
                                         <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Alerta</strong> ¡Su Formato de Movimientos Extemporaneos se ha actualizado con exito!
                                    <a href="FormatoMoviExtemp.php" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
                                </div>
                                <?php else:
                                    $mensaje = ''; 
                                    ?>
                                <?php 
                                    endif;
                                
                                ?>

                               

                                <!-- botones para ocultar tablas -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Filtrar por empresa <i class="fas fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#" id="ocultarGracoil">Gracoil</a></li>
                                        <li><a class="dropdown-item" href="#" id="ocultarInter">Interamericana</a></li>
                                        <li><a class="dropdown-item" href="#" id="ocultarCarbu">Carburantes</a></li>
                                        <li><a class="dropdown-item" href="#" id="ocultarNino">Transliquidos</a></li>
                                    </ul>
                                </div>


                                <!-- contenido de Gracoil -->
                                <div class="table-responsive" id="datosGracoil">
                                    <div style="width: 150px; height: 100px;">
                                        <img src="../../static/imagenes/Gracoil_Logo-01.png" class="img-fluid" style="transform: scale(1); padding: 0px; margin: 0px;">
                                    </div>
                                    <table class="table table-hover table-bordered table-sm estilo_tabla" id="tableExtGracoil">
                                        <thead>
                                            <tr>
                                                <th>N° Operacion</th>
                                                <th>Clave de la solicitud</th>
                                                <th>Área</th>
                                                <th>Proceso</th>
                                                <th>Importe</th>
                                                <th>Solicitud</th>
                                                <th>Fecha limite de registro</th>
                                                <th>Fecha de captura</th>
                                                <th>Dias de atraso</th>
                                                <th>Justificación</th>
                                                <th>Observaciones</th>
                                                <th>Nombre del responsable de área</th>
                                                <th>Nombre del responsable del proceso</th>
                                                <th>Empresa</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../../includes/conexionG.php");
                                            $consulta = "SELECT * FROM mov_ext_empresa WHERE empresa = 'GRACOIL';";
                                            $datos = mysqli_query($enlace, $consulta);
                                            while ($dato = mysqli_fetch_assoc($datos)) {


                                            ?>
                                                <tr>
                                                    <td><?php echo $dato['no_ope']; ?></td>
                                                    <td><?php echo $dato['clv_sol_inc']; ?></td>
                                                    <td><?php echo $dato['area']; ?></td>
                                                    <td><?php echo $dato['proceso']; ?></td>
                                                    <td>$ <?php echo number_format($dato['importe'], 2); ?></td>
                                                    <td><?php echo $dato['solicitud']; ?></td>
                                                    <td><?php echo $dato['fec_lim_reg']; ?></td>
                                                    <td><?php echo $dato['fec_cap']; ?></td>
                                                    <td><?php echo $dato['dias_atra']; ?></td>
                                                    <td><?php echo $dato['just']; ?></td>
                                                    <td><?php echo $dato['obser']; ?></td>
                                                    <td><?php echo $dato['nom_resp_area']; ?></td>
                                                    <td><?php echo $dato['nom_resp_proc']; ?></td>
                                                    <td><?php echo $dato['empresa']; ?></td>
                                                    <td style="display: flex; justify-content: center;   align-items: center;">
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-sm" title="Editar registro con el N°Ope <?php echo $dato['no_ope'];?>" onclick="editar('<?php echo $dato['id_ext']; ?>')"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="generar_pdf('<?php echo $dato['id_ext']; ?>','<?php echo $dato['empresa']; ?>')"><i class="fas fa-file-pdf"></i></button>
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
                                <!-- termina el contenido de gracoil -->

                                <!-- Contenido de interamericana -->
                                <div class="table-responsive" id="datosInter">
                                    <div style="width: 150px; height: 100px; display: flex; align-items: center;">
                                        <img src="../../static/imagenes/Interamericana_v1_negro.png" class="img-fluid" style="transform: scale(1); padding: 0px; margin: 0px;">
                                    </div>
                                    <table class="table table-hover table-bordered table-sm estilo_tabla" id="tableExtInter">
                                        <thead>
                                            <tr>
                                                <th>N° Operacion</th>
                                                <th>Clave de la solicitud</th>
                                                <th>Área</th>
                                                <th>Proceso</th>
                                                <th>Importe</th>
                                                <th>Solicitud</th>
                                                <th>Fecha limite de registro</th>
                                                <th>Fecha de captura</th>
                                                <th>Dias de atraso</th>
                                                <th>Justificación</th>
                                                <th>Observaciones</th>
                                                <th>Nombre del responsable de área</th>
                                                <th>Nombre del responsable del proceso</th>
                                                <th>Empresa</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../../includes/conexionG.php");
                                            $consulta = "SELECT * FROM mov_ext_empresa WHERE empresa = 'inter';";
                                            $datos = mysqli_query($enlace, $consulta);
                                            while ($dato = mysqli_fetch_assoc($datos)) {


                                            ?>
                                                <tr>
                                                    <td><?php echo $dato['no_ope']; ?></td>
                                                    <td><?php echo $dato['clv_sol_inc']; ?></td>
                                                    <td><?php echo $dato['area']; ?></td>
                                                    <td><?php echo $dato['proceso']; ?></td>
                                                    <td>$ <?php echo number_format($dato['importe'], 2); ?></td>
                                                    <td><?php echo $dato['solicitud']; ?></td>
                                                    <td><?php echo $dato['fec_lim_reg']; ?></td>
                                                    <td><?php echo $dato['fec_cap']; ?></td>
                                                    <td><?php echo $dato['dias_atra']; ?></td>
                                                    <td><?php echo $dato['just']; ?></td>
                                                    <td><?php echo $dato['obser']; ?></td>
                                                    <td><?php echo $dato['nom_resp_area']; ?></td>
                                                    <td><?php echo $dato['nom_resp_proc']; ?></td>
                                                    <td><?php echo $dato['empresa']; ?></td>
                                                    <td style="display: flex; justify-content: center;   align-items: center;">
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-sm" onclick="editar('<?php echo $dato['id_ext']; ?>')"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="generar_pdf('<?php echo $dato['id_ext']; ?>','<?php echo $dato['empresa']; ?>')"><i class="fas fa-file-pdf"></i></button>
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
                                <!-- Termina el contenido de interamericana -->

                                <!-- Contenido de Carburantes del centro -->
                                <div class="table-responsive" id="datosCarbu">
                                    <div style="width: 150px; height: 100px; display: flex; align-items: center;">
                                        <img src="../../static/imagenes/Carburantes_v2_negro.png" class="img-fluid" style="transform: scale(1); padding: 0px; margin: 0px;">
                                    </div>
                                    <table class="table table-hover table-bordered table-sm estilo_tabla" id="tableExtCarbu">
                                        <thead>
                                            <tr>
                                                <th>N° Operacion</th>
                                                <th>Clave de la solicitud</th>
                                                <th>Área</th>
                                                <th>Proceso</th>
                                                <th>Importe</th>
                                                <th>Solicitud</th>
                                                <th>Fecha limite de registro</th>
                                                <th>Fecha de captura</th>
                                                <th>Dias de atraso</th>
                                                <th>Justificación</th>
                                                <th>Observaciones</th>
                                                <th>Nombre del responsable de área</th>
                                                <th>Nombre del responsable del proceso</th>
                                                <th>Empresa</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../../includes/conexionG.php");
                                            $consulta = "SELECT * FROM mov_ext_empresa WHERE empresa = 'CARBURANTE';";
                                            $datos = mysqli_query($enlace, $consulta);
                                            while ($dato = mysqli_fetch_assoc($datos)) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $dato['no_ope']; ?></td>
                                                    <td><?php echo $dato['clv_sol_inc']; ?></td>
                                                    <td><?php echo $dato['area']; ?></td>
                                                    <td><?php echo $dato['proceso']; ?></td>
                                                    <td>$ <?php echo number_format($dato['importe'], 2); ?></td>
                                                    <td><?php echo $dato['solicitud']; ?></td>
                                                    <td><?php echo $dato['fec_lim_reg']; ?></td>
                                                    <td><?php echo $dato['fec_cap']; ?></td>
                                                    <td><?php echo $dato['dias_atra']; ?></td>
                                                    <td><?php echo $dato['just']; ?></td>
                                                    <td><?php echo $dato['obser']; ?></td>
                                                    <td><?php echo $dato['nom_resp_area']; ?></td>
                                                    <td><?php echo $dato['nom_resp_proc']; ?></td>
                                                    <td><?php echo $dato['empresa']; ?></td>
                                                    <td style="display: flex; justify-content: center;   align-items: center;">
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-sm" onclick="editar('<?php echo $dato['id_ext']; ?>')"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="generar_pdf('<?php echo $dato['id_ext']; ?>','<?php echo $dato['empresa']; ?>')"><i class="fas fa-file-pdf"></i></button>
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
                                <!-- Termina el contenido de Carburantes del centro -->

                                <!-- Contenido de Transliquidos de Hidalgo -->
                                <div class="table-responsive" id="datosNino">
                                    <div style="width: 150px; height: 100px; display: flex; align-items: center;">
                                        <img src="../../static/imagenes/Transliquidos.jpg" class="img-fluid" style="transform: scale(1); padding: 0px; margin: 0px;">
                                    </div>
                                    <table class="table table-hover table-bordered table-sm estilo_tabla" id="tableExtNino">
                                        <thead>
                                            <tr>
                                                <th>N° Operacion</th>
                                                <th>Clave de la solicitud</th>
                                                <th>Área</th>
                                                <th>Proceso</th>
                                                <th>Importe</th>
                                                <th>Solicitud</th>
                                                <th>Fecha limite de registro</th>
                                                <th>Fecha de captura</th>
                                                <th>Dias de atraso</th>
                                                <th>Justificación</th>
                                                <th>Observaciones</th>
                                                <th>Nombre del responsable de área</th>
                                                <th>Nombre del responsable del proceso</th>
                                                <th>Empresa</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../../includes/conexionG.php");
                                            $consulta = "SELECT * FROM mov_ext_empresa WHERE empresa = 'NINO';";
                                            $datos = mysqli_query($enlace, $consulta);
                                            while ($dato = mysqli_fetch_assoc($datos)) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $dato['no_ope']; ?></td>
                                                    <td><?php echo $dato['clv_sol_inc']; ?></td>
                                                    <td><?php echo $dato['area']; ?></td>
                                                    <td><?php echo $dato['proceso']; ?></td>
                                                    <td>$ <?php echo number_format($dato['importe'], 2); ?></td>
                                                    <td><?php echo $dato['solicitud']; ?></td>
                                                    <td><?php echo $dato['fec_lim_reg']; ?></td>
                                                    <td><?php echo $dato['fec_cap']; ?></td>
                                                    <td><?php echo $dato['dias_atra']; ?></td>
                                                    <td><?php echo $dato['just']; ?></td>
                                                    <td><?php echo $dato['obser']; ?></td>
                                                    <td><?php echo $dato['nom_resp_area']; ?></td>
                                                    <td><?php echo $dato['nom_resp_proc']; ?></td>
                                                    <td><?php echo $dato['empresa'] == 'NINO' ? 'Transliquidos' :  '';   ?></td>
                                                    <td style="display: flex; justify-content: center;   align-items: center;">
                                                        <div>
                                                            <button type="button" class="btn btn-warning btn-sm" onclick="editar('<?php echo $dato['id_ext']; ?>')"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="generar_pdf('<?php echo $dato['id_ext']; ?>','<?php echo $dato['empresa']; ?>')"><i class="fas fa-file-pdf"></i></button>
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
                                <!-- Termina el contenido de Transliquidos de Hidalgo -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script async src="../../static/js/Contabilidad/cont_mov_ext_emp.js"></script>
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