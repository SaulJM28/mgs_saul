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
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid" style="margin-top: 50px; background-color: rgb(255, 255, 255); padding: 1rem; border-radius: 8px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.634);">
                <div class="row">
                    <div class="col col-sm-12" style="display: flex;">
                        <div>
                            <p>Recursos Humanos/Salarios/Agregar nuevo salario</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12">
                                <div>
                                    <a class="btn btn-primary btn-sm" href="../Salarios/lista_salarios_empleados.php"><i class="fa fa-arrow-left"></i> Volver</a>
                                    <h2 style="text-align: center;">Aumento de salario a empleados</h2>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>¡Aviso!</strong> Campos de caracter obligatorio <strong>(*)</strong>. 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <small style="text-align: center;"><b>*</b> De no encontrar al empleado, favor de comunicarse con el área de recursos humanos <b>*</b></small>
                                </div>

                                <form action="./back/insert_nuevo_salario.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                        <div class="mb-3">
                                        <label for="fech_regis" class="form-label">Empleado (*)</label>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"  onChange="get_ultSueldo()" id="empleado" name="empleado"  required>
                                                <option selected value="">Seleccione un empleado</option>
                                                <?php
                                                include("../../includes/conexionG.php");
                                                $consulta = "SELECT id_emp, nom, ap1, ap2 FROM empleados_rh ;";
                                                $datos = mysqli_query($enlace, $consulta);
                                                while ($dato = mysqli_fetch_assoc($datos)) {
                                                ?>
                                                    <option value="<?php echo $dato['id_emp'] ?>"><?php echo $dato['nom'] ?> <?php echo $dato['ap1'] ?> <?php echo $dato['ap2'] ?></option>
                                                <?php }
                                                mysqli_close($enlace);
                                                ?>

                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="fech_regis" class="form-label">Fecha de registro</label>
                                                <input type="date" class="form-control form-control-sm" id="fech_regis" name="fech_regis" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>

                                

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="sal_actual" class="form-label">Salario Actual</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="sal_actual" name="sal_actual" placeholder="Ingrese el salario actual del empleado" onChange="calcular_dif_sal()" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="porcentaje" class="form-label">Porcentaje (*)</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="porcentaje" name="porcentaje" placeholder="Ingrese el porcentaje de salario a aumentar" onChange="calcular_dif_sal()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="sal_nuevo" class="form-label">Nuevo Salario</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="sal_nuevo" name="sal_nuevo" placeholder="Ingrese el nuevo salario del empleado" onChange="calcular_dif_sal()" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="sal_dif" class="form-label">Diferencia</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="sal_dif" name="sal_dif" placeholder="La diferencia se genera en automatico" readonly>
                                            </div>
                                        </div>
                                    </div>


                                    <div style="display: flex; justify-content: right;">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</button>
                                    </div>



                                </form>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script async src="../../static/js/RecursosHumano/salarios_listaEmpleados_create.js"></script>
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