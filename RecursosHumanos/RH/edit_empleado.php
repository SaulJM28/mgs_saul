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
                            <p>Recursos Humanos/R H/Editar Empleado</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12">
                                <div>
                                    <a href="./lista_empleados.php" class="btn  btn-primary btn-sm"><i class="fa-solid fa-arrow-left"></i> Volver</a>
                                </div>
                                <div>
                                    <h2 style="text-align: center;">Editar Empleados</h2>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>!Aviso!</strong> Campos de caracter obligatorio <strong>(*)</strong>. De no contar con la información llenar el campo como;<strong> N/A</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-sm-12">
                                <form method="POST" action="./back/update_empleado.php" id="mi_formulario" enctype="multipart/form-data">
                                <div class="row g-4">
                                    <input type="hidden" name = "id" id = "id">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="nom_emp" class="form-label">Nombre(s) (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="nom_emp" name="nom_emp" placeholder="Ingrese el nombre(s)" required>
                                                <small class="form-text">Puede ingresar el primer y el segundo nombre.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ap1_emp" class="form-label">Primer Apellido (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="ap1_emp" name="ap1_emp" placeholder="Ingrese el primer apellido" required>
                                                <small class="form-text"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ap2_emp" class="form-label">Segundo Apellido (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="ap2_emp" name="ap2_emp" placeholder="Ingrese el segundo apellido" required>
                                                <small class="form-text"></small>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="nss" class="form-label">NSS (Número de Seguro Social) (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="nss" name="nss" placeholder="Ingrese el numero de seguro social" maxlength="11" required>
                                                <small class="form-text">El número de seguro social consta de 11 digitos.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="CURP" class="form-label">CURP (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="CURP" name="CURP" placeholder="Ingrese el CURP" maxlength="18" required>
                                                <small class="form-text">El CURP consta de 18 digitos.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="RFC" class="form-label">RFC (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="RFC" name="RFC" placeholder="Ingrese el RFC" maxlength="13" required>
                                                <small class="form-text">El RFC puede ser de 13 o 12 digitos</small>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="fech_nac" class="form-label">Fecha de nacimienito (*)</label>
                                                <input type="date" class="form-control form-control-sm" id="fech_nac" name="fech_nac" required>
                                                <small class="form-text">La edad sera generada después de dar de alta al empleado</small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Teléfono (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="tel" name="tel" placeholder="Ingrese el teléfono celular" maxlength="12" required>
                                                <small class="form-text"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="correo_emp" class="form-label">Correo Electronico (*)</label>
                                                <input type="email" class="form-control form-control-sm" id="correo_emp" name="correo_emp" placeholder="Ingrese el correo electronico" required>
                                                <small class="form-text"></small>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="gra_aca" class="form-label">Grado Academico (*)</label>
                                                <select class="form-select form-select-sm" id="gra_aca" name="gra_aca" required>
                                                    <option selected value="">Seleccione un grado academico</option>
                                                    <option value="Secundaria">Secundaria</option>
                                                    <option value="Preparatoria">Preparatoria</option>
                                                    <option value="Lincenciatura/Ingenieria">Lincenciatura/Ingenieria</option>
                                                    <option value="Especialización/Maestria">Especialización/Maestria</option>
                                                    <option value="Doctorado">Doctorado</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="nom_carr" class="form-label">Nombre de la carrera (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="nom_carr" name="nom_carr" placeholder="Ingrese el nombre de la carrera" required>
                                                <small class="form-text">De no contar con un nombre poner <b>N/A</b></small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="est_civ" class="form-label">Estado Civil (*)</label>
                                                <select class="form-select form-select-sm" id="est_civ" name="est_civ" required>
                                                    <option selected value="">Seleccione un estado civil</option>
                                                    <option value="Soltero">Soltero</option>
                                                    <option value="Casado">Casado</option>
                                                    <option value="Divorciado">Divorciado</option>
                                                    <option value="Separación en proceso judicial">Separación en proceso judicial</option>
                                                    <option value="Viudo">Viudo</option>
                                                    <option value="Concubinato">Concubinato</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="hijos" class="form-label">Tiene Hijos (*)</label>
                                                <select class="form-select form-select-sm" id="hijos" name="hijos" onchange="numhijos()" required>
                                                    <option selected value="">Seleccione una opción</option>
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="num_hijos" class="form-label">Número de hijos</label>
                                                <input type="text" class="form-control form-control-sm" id="num_hijos" name="num_hijos" placeholder="Ingrese el número de hijos" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="num_conct_emerg" class="form-label">Número conactato emergencias (*)</label>
                                                <input type="text" class="form-control form-control-sm" id="num_conct_emerg" name="num_conct_emerg" placeholder="Ingrese el número de hijos" maxlength="12" required>
                                                <small class="form-text"></small>
                                            </div>
                                        </div>

                                        <h5 style="text-align: center;">Datos del empleado relacionados con la empresa</h5>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="fecha_regis" class="form-label">Fecha de registro del empleado </label>
                                                <input type="date" class="form-control form-control-sm" id="fecha_regis" name="fecha_regis" readonly>
                                                <small class="form-text"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="sueldo" class="form-label">Sueldo Neto al mes (*)</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="sueldo" name="sueldo" placeholder="Ingrese el sueldo" required>
                                                <small class="form-text"></small>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="empresa" class="form-label">Empresa (*)</label>
                                                <select class="form-select form-select-sm" id="empresa" name="empresa" required>
                                                    <option selected value="">Seleccione una opción</option>
                                                    <?php
                                                     include("../../includes/conexionG.php");
                                                     $consulta = "SELECT * FROM empresas_rh ;";
                                                     $datos = mysqli_query($enlace, $consulta);
                                                     while ($dato = mysqli_fetch_assoc($datos)) {
                                                    ?>
                                                        <option value="<?php echo $dato['nom_emp']; ?>"><?php echo $dato['nom_emp']; ?></option>
                                                    <?php
                                                    }
                                                    mysqli_close($enlace);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="puesto" class="form-label">Puesto (*)</label>
                                                <select class="form-select form-select-sm" id="puesto" name="puesto"  required>
                                                    <option selected value="">Seleccione una opción</option>
                                                    <?php
                                                     include("../../includes/conexionG.php");
                                                     $consulta = "SELECT * FROM puestos_rh ;";
                                                     $datos = mysqli_query($enlace, $consulta);
                                                     while ($dato = mysqli_fetch_assoc($datos)) {
                                                    ?>
                                                        <option value="<?php echo $dato['nom_puesto']; ?>"><?php echo $dato['nom_puesto']; ?></option>
                                                    <?php
                                                    }
                                                    mysqli_close($enlace);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="ubicacion" class="form-label">Ubicación (*)</label>
                                                <select class="form-select form-select-sm" id="ubicacion" name="ubicacion"  required>
                                                    <option selected value="">Seleccione una opción</option>
                                                    <?php
                                                     include("../../includes/conexionG.php");
                                                     $consulta = "SELECT * FROM ubicacione_rh ;";
                                                     $datos = mysqli_query($enlace, $consulta);
                                                     while ($dato = mysqli_fetch_assoc($datos)) {
                                                    ?>
                                                        <option value="<?php echo $dato['nom_ubic']; ?>"><?php echo $dato['nom_ubic']; ?></option>
                                                    <?php
                                                    }
                                                    mysqli_close($enlace);
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div style="justify-content: right; display: flex;">
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




    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script async src="../../static/js/RecursosHumano/rh_list_empleados_edit.js"></script>
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