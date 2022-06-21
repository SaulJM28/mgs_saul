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
                    <a href="#Dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Empresas</a>
                    <ul class="collapse list-unstyled" id="Dashboard">
                        <li>
                            <a href="../Empresas/lista_empresas.php">Lista de Empresa</a>
                        </li>
                    </ul>
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
                            <p>Recursos Humanos/Empresas/Lista de Empresas</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <h2 style="text-align: center;">Lista de Empresas</h2>
                        <div style="display: flex; justify-content: center">
                        </div>
                        <br>
                        <div>
                            <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i> Crear </a>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-hover table-bordered table-sm estilo_tabla" style="width:100%" id="tablaListaEmpresas">
                                    <thead>
                                        <tr>
                                            <th>Nombre Empresa</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("../../includes/conexionG.php");
                                        $consulta = "SELECT * FROM empresas_rh WHERE estatus = 'ACTIVO';";
                                        $datos = mysqli_query($enlace, $consulta);
                                        while ($dato = mysqli_fetch_assoc($datos)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $dato['nom_emp']; ?></td>
                                                <td><?php echo $dato['estatus']; ?></td>
                                                <td style="display: flex; justify-content: center;   align-items: center;">
                                                    <div class="btn-group" role="group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-info btn-sm " data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-list"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                            <li><a type="button" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editar" title="Editar :  <?php echo $dato['nom_emp']; ?>" onclick="get_datos_edit('<?php echo $dato['id_empresa']; ?>')"><i class="fa fa-edit"></i> Editar</a></li>
                                                            <li><a type="button" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#eliminar" title="Eliminar:  <?php echo utf8_encode($dato['nom_emp']); ?>" onclick="get_datos_elim('<?php echo $dato['id_empresa']; ?>')"><i class="fa-solid fa-trash"></i> Eliminar</a></li>
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
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Agregar Area -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Empresas/back/insert_empresa.php" method="POST" enctype="multipart/form-data">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>!Aviso!</strong> Campos de caracter obligatorio <strong>(*)</strong>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label for="nom_emp" class="form-label">Nombre Empresa (*)</label>
                            <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" maxlength="150" minlength="1" onkeyup="javascript:this.value=this.value.toUpperCase();" id="nom_emp" name = "nom_emp" placeholder="Ingrese el nombre de la empresa a registrar" required>
                        </div>
                        <div style="display: flex; justify-content: right">
                            <button type="submit" class="btn  btn-sm btn-success"><i class="fa fa-plus"></i> Agregar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


        <!-- Modal Editar -->
        <div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Empresas/back/update_empresa.php" method="POST" enctype="multipart/form-data">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>!Aviso!</strong> Campos de caracter obligatorio <strong>(*)</strong>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label for="nom_emp_edit" class="form-label">Nombre Empresa (*)</label>
                            <input type="hidden"  id="id_edit" name='id_edit'>
                            <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" maxlength="150" minlength="1" onkeyup="javascript:this.value=this.value.toUpperCase();" id="nom_emp_edit" name="nom_emp_edit" placeholder="Ingrese el nombre de la Empresa a editar" required>
                        </div>
                        <div style="display: flex; justify-content: right">
                            <button type="submit" class="btn  btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar -->
    <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Eliminar Empresa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../Empresas/back/delete_empresa.php" method="POST" enctype="multipart/form-data">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>!Aviso!</strong> Al eliminar un registro, se vuelve inactivo, si borra uno por accidente y lo quiere recuperar, favor de comunicarse con  el área de desarrollo.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <h5>¿Desea eliminar?</h5>
                        <div class="mb-3">
                            <label for="nom_emp_elim" class="form-label">Nombre Empresa</label>
                            <input type="hidden"  id="id_elim" name="id_elim" >
                            <input type="text" class="form-control form-control-sm" style="text-transform: uppercase;" maxlength="150" minlength="1" onkeyup="javascript:this.value=this.value.toUpperCase();" id="nom_emp_elim"  name="nom_emp_elim" placeholder="Nombre de la empresa a eliminar"  readonly required>
                        </div>
                        <div style="display: flex; justify-content: right">
                            <button type="submit" class="btn  btn-sm btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
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
<script async src="../../static/js/RecursosHumano/empresa_lista_empresas.js"></script>
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