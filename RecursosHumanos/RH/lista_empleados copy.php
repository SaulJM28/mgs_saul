<?php
date_default_timezone_set('america/mexico_city');
function obtener_edad_segun_fecha($fecha_nacimiento)
{
    $nacimiento = new DateTime($fecha_nacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                    <a href="#Dashboard">Recursos Humanos</a>
                </li>
                <li>
                    <a href="#datoscliente" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Empleados</a>
                    <ul class="collapse list-unstyled" id="datoscliente">
                        <li>
                            <a href="../RH/lista_empleados.php">Lista de empleados</a>
                        </li>
                        <li>
                            <a href="../RH/create_empleado.php">Crear nuevo empleado</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#desccliente" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-money-bill"></i> Salarios</a>
                    <ul class="collapse list-unstyled" id="desccliente">
                        <li>
                            <a href="../Salarios/lista_salarios_empleados.php">Lista de salarios Empleados</a>
                        </li>
                        <li>
                            <a href="../Salarios/lista_salarios_empleado.php">Historial de salario de un empleado</a>
                        </li>
                        <li>
                            <a href="../Salarios/agregar_nuevo_salario.php">Aumento de salario a empleado</a>
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
                                <a class="nav-link link-nav-top" href="../../RecursosHumanos/RH/lista_empleados.php" style="color: white; margin: 0px 0px 0px 5px">Recurso Humanos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-nav-top" href="../../RecursosHumanos/ExpedienteClinico/expediente_clinico.php" style="color: white; margin: 0px 0px 0px 5px">Expediente Clinico</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-nav-top" href="../../RecursosHumanos/Salarios/lista_salarios_empleados.php" style="color: white; margin: 0px 0px 0px 5px">Salarios</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid" style="margin-top: 50px; background-color: rgb(255, 255, 255); padding: 1rem; border-radius: 8px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.634);">
                <div class="row">
                    <div class="col col-sm-12" style="display: flex;">
                        <div>
                            <p>Recursos Humanos/R H/Lista empleados</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12">
                                <div>
                                    <a type="button" href="../RH/create_empleado.php" class="btn  btn-success btn-sm"><i class="fa-solid fa-plus"></i> Crear</a>
                                </div>
                                <div>
                                    <h2 style="text-align: center;">Lista de Empleados</h2>
                                </div>
                                <!-- Inicia Tabla lista de empleados -->
                                <div>
                                    <table class="table table-hover table-bordered table-sm estilo_tabla" id="tableListaEmpleados">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>NSS</th>
                                                <th>CURP</th>
                                                <th>RFC</th>
                                                <th>Fecha Nac</th>
                                                <th>Edad</th>
                                                <th>Teléfono</th>
                                                <th>Correo</th>
                                                <th>Grado Acádemico</th>
                                                <th>Carrera</th>
                                                <th>Estado Civil</th>
                                                <th>Hijos</th>
                                                <th>Numero Hijos</th>
                                                <th>Conctato Emergencia</th>
                                                <th>Fecha Registro</th>
                                                <th>Sueldo</th>
                                                <th>Puesto</th>
                                                <th>Empresa</th>
                                                <th>Ubicación</th>
                                                <th>Act Nac</th>
                                                <th>RFC</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center;">
                                            <?php
                                            include("../../includes/conexionG.php");
                                            $consulta = "SELECT * FROM empleados_rh WHERE estatus = 'ACTIVO' ;";
                                            $datos = mysqli_query($enlace, $consulta);
                                            while ($dato = mysqli_fetch_assoc($datos)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $dato['nom'], ' ' . $dato['ap1'], ' ' . $dato['ap2']; ?></td>
                                                    <td><?php echo $dato['NSS']; ?></td>
                                                    <td><?php echo $dato['CURP']; ?></td>
                                                    <td><?php echo $dato['RFC']; ?></td>
                                                    <td><?php echo $dato['Fech_nac']; ?></td>
                                                    <td><?php echo obtener_edad_segun_fecha($dato['Fech_nac']); ?></td>
                                                    <td><?php echo $dato['tel_mov']; ?></td>
                                                    <td><?php echo $dato['correo']; ?></td>
                                                    <td><?php echo $dato['gra_aca']; ?></td>
                                                    <td><?php echo $dato['nom_carr']; ?></td>
                                                    <td><?php echo $dato['est_civ']; ?></td>
                                                    <td><?php echo $dato['hijos']; ?></td>
                                                    <td><?php echo $dato['num_hijos']; ?></td>
                                                    <td><?php echo $dato['num_conct_emer']; ?></td>
                                                    <td><?php echo $dato['fec_alt']; ?></td>
                                                    <td>$ <?php echo  number_format($dato['sueldo'], 2); ?></td>
                                                    <td><?php echo $dato['puesto'] ?></td>
                                                    <td><?php echo $dato['empresa'] ?></td>
                                                    <td><?php echo $dato['ubicacion'] ?></td>
                                                    <td><?php
                                                        date_default_timezone_set('america/mexico_city');
                                                        if ($dato['act_nac'] == '' || $dato['act_nac'] == NULL) {
                                                            echo '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#act_nac"><i class="fa fa-file"></i>
                                                            </button>';
                                                        } elseif (file_exists('./documentos/' . $dato['act_nac'])) {
                                                            echo '<a style="width: 100%; font-size: 9px;" class="btn btn-sm bg-secondary text-white" href="./evidencias/' . $dato["act_nac"] . '" title="Ultima modificacion fue: ' . date("y-m-s H:i:s.", filemtime("./evidencias/" . $dato['act_nac'])) . '" "><i class="fa fa-download"></i> ' . $dato['act_nac'] . ' </a>';
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php
                                                        date_default_timezone_set('america/mexico_city');
                                                        if ($dato['doc_rfc'] == '' || $dato['doc_rfc'] == NULL) {
                                                            echo '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#doc_rfc"><i class="fa fa-file"></i>
                                                            </button>';
                                                        } elseif (file_exists('./documentos/' . $dato['doc_rfc'])) {
                                                            echo '<a style="width: 100%; font-size: 9px;" class="btn btn-sm bg-secondary text-white" href="./evidencias/' . $dato["doc_rfc"] . '" title="Ultima modificacion fue: ' . date("y-m-s H:i:s.", filemtime("./evidencias/" . $dato['doc_rfc'])) . '" "><i class="fa fa-download"></i> ' . $dato['doc_rfc'] . ' </a>';
                                                        } else {
                                                            echo '';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button id="btnGroupDrop1" type="button" class="btn btn-info btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fas fa-list"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <li><a type="button" class="dropdown-item" title="Ver más informacion sobre el empleado :  <?php echo $dato['nom']; ?>" onclick="editar('<?php echo $dato['id_emp']; ?>')"><i class="fa fa-edit"></i> Editar</a></li>
                                                                <li><a type="button" class="dropdown-item" title="Editar Empleado:  <?php echo utf8_encode($dato['nom']); ?>" onclick="ver_mas('<?php echo $dato['id_emp']; ?>')"><i class="fa-solid fa-users"></i> Ver más</a></li>
                                                                <li><a type="button" class="dropdown-item" title="Eliminar Empleado:  <?php echo utf8_encode($dato['nom']); ?>" onclick="eliminar('<?php echo $dato['id_emp']; ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-trash"></i> Eliminar</a></li>
                                                            </ul>
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
                                <!-- Termina tabla lista de empleados -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para elimiar al empleado -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar Emplado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>!Aviso!</strong> Al eliminar un registro, se vuelve inactivo, si borra uno por accidente y lo quiere recuperar, favor de comunicarse con el área de desarrollo.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="../RH/back/delete_empleado.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nom_emp" class="form-label">Nombre Empleado</label>
                            <input type="hidden" class="form-control" id="id_elim" name="id_elim">
                            <input type="text" class="form-control" id="nom_emp" name="nom_emp" aria-describedby="nom_emp" placeholder="Nombre del empleado a eliminar" readonly>
                        </div>
                        <div style="display: flex; justify-content: right;">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Subir Acta de Naciminetos -->
    <div class="modal fade" id="act_nac" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Subir Acta de Nacimineto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="act_naci" class="form-label">Acta de nacimineto</label>
                            <input type="file" class="form-control form-control-sm" id="act_naci" name="act_naci" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-file-upload"></i> Subir Documento</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


     <!-- Modal Subir Acta de Naciminetos -->
     <div class="modal fade" id="doc_rfc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Subir RFC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="act_naci" class="form-label">RFC</label>
                            <input type="file" class="form-control form-control-sm" id="act_naci" name="act_naci" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-file-upload"></i> Subir Documento</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script async src="../../static/js/RecursosHumano/rh_list_empleados.js"></script>
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

</html>