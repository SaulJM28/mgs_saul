<!DOCTYPE html>
<html>

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
                            <p>Contabilidad/Lista de Actividades/edit_actividad</p>
                            <a class="btn btn-primary btn-sm " href="../listaActividades/lista_actividades.php"><i class="fa fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12 table-responsive">
                                <div>
                                    <h2 style="text-align: center;">Editar Actividad</h2>
                                    <small>Campos de caracter obligatorio (*). De no contar con la informacion poner en el campo <b>N/A</b></small>
                                </div>

                                <div>
                                    <form action="./back/update_actividad.php" method="post" id="mi_formulario" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="nom_acti" class="form-label">Nombre de la actividad (*)</label>
                                                    <input type="hidden"  id="id_ac" name="id_ac"    >
                                                    <input type="text" class="form-control" id="nom_acti" name="nom_acti"  placeholder="Ingrese el nombre de la actividad"  required>
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="fecha_lim" class="form-label">Fecha Limite (*)</label>
                                                    <input type="date" class="form-control" id="fecha_lim" name="fecha_lim"  required>
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="avance" class="form-label">Avance (*)</label>
                                                    <select class="form-select" aria-label="seleccione empresa" id="avance" name="avance" required>
                                                        <option value="" selected>Seleccione el avance de la actividad</option>
                                                        <option value="0">0%</option>
                                                        <option value="10">10%</option>
                                                        <option value="20">20%</option>
                                                        <option value="30">30%</option>
                                                        <option value="40">40%</option>
                                                        <option value="50">50%</option>
                                                        <option value="60">60%</option>
                                                        <option value="70">70%</option>
                                                        <option value="80">80%</option>
                                                        <option value="90">90%</option>
                                                        <option value="100">100%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-4">
                                                <label for="prese">Presentación</label>
                                                <input type="file" class="form-control" id="prese" name="prese">
                                            </div>
                                            <div class="col col-sm-4">
                                                <label for="revi">Revisado (*)</label>
                                                <select class="form-select" aria-label="seleccione empresa" id="revi" name="revi" required>
                                                        <option value="" selected>Seleccione una opción</option>
                                                        <option value="NO">NO</option>
                                                        <option value="SI">SI</option>
                                                    </select>
                                            </div>
                                            <div class="col col-sm-4">
                                                <label for="comp">Compartido (*)</label>
                                                <select class="form-select" aria-label="seleccione empresa" id="comp" name="comp" required>
                                                        <option value="" selected>Seleccione una opción</option>
                                                        <option value="NO">NO</option>
                                                        <option value="SI">SI</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-6">
                                            <div class="mb-3">
                                                    <label for="dpto" class="form-label">Departamento (*)</label>
                                                    <select class="form-select" aria-label="seleccione empresa" id="dpto" name="dpto" required>
                                                        <option value="" selected>Seleccione una opción</option>
                                                        <?php
                                                        include '../../includes/conexionG.php';

                                                        $consulta = "SELECT * FROM departamentos WHERE estatus = 'ACTIVO';";
                                                        $datos = mysqli_query($enlace, $consulta);
                                                        while ($dato = mysqli_fetch_assoc($datos)) {

                                                        ?>
                                                            <option value="<?php echo $dato['nom_dpto']; ?>"><?php echo $dato['nom_dpto']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-sm-6">
                                                <div class="mb-3">
                                                <label for="observaciones" class="form-label">Observaciones (*)</label>
                                                    <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Escriba observaciones de la actividad" rows="1" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                     

                                        <div style="display: flex; justify-content: right;">
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Confirmar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script async src="../../static/js/Contabilidad/cont_list_actividades_edit.js"></script>
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