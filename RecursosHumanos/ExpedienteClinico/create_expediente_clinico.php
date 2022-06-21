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
                    <a href="#Dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Doctor</a>
                    <ul class="collapse list-unstyled" id="Dashboard">
                        <li>
                            <a href="/Dasboard/dasboard_gen.html">Crear expediente Clinico</a>
                        </li>
                        <li>
                            <a href="#">Lista de expedientes</a>
                        </li>
                        <li>
                            <a href="#">Graficas</a>
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
                            <p>Recursos Humanos/Expediente Clinico/expediente clinico</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12">
                                <a  href="../ExpedienteClinico/lista_expedientes_clinicos.php" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Volver</a>
                                <div>
                                    <h2 style="text-align: center;">Expediente clinico</h2>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>¡Aviso!</strong>De no encontrar al empleado, favor de comunicarse con el área de recursos humanos. 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>

                                <form action="./back/insert_expediente_clinico.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                        <div class="mb-3">
                                        <label for="fech_regis" class="form-label">Empleado</label>
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="empleado" name="empleado" onChange="obtner_datos_empleado()" required>
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
                                                <label for="nom" class="form-label">Nombre</label>
                                                <input type="text" class="form-control form-control-sm" id="nom" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="ap1" class="form-label">Primer Apellido</label>
                                                <input type="text" class="form-control form-control-sm" id="ap1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="ap2" class="form-label">Segundo Apellido</label>
                                                <input type="text" class="form-control form-control-sm" id="ap2" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="fech_nac" class="form-label" style="font-size: 14px;">Fecha de nacimiento</label>
                                                <input type="date" class="form-control form-control-sm" id="fech_nac" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control form-control-sm" id="tel" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="alergias" class="form-label">¿Tiene Alergias?</label>
                                                <select class="form-select" id="alergias" name="alergias" onChange="Alergias()" required>
                                                    <option selected>Seleccione una opción</option>
                                                    <option value="SI">SI</option>
                                                    <option value="NO">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="desc_alergias" class="form-label" style="font-size: 14px;">Descripcion Alergias</label>
                                                <textarea class="form-control form-control-sm" id="desc_alergias" name="desc_alergias" rows="1" readonly ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="talla" class="form-label">Talla</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="talla" name="talla" placeholder="Ingrese la talla en M (1.75 M)" onChange="calcularIMC()" required>
                                            </div>
                                        </div>

                                     

                                    </div>

                                    <div class="row">
                                        
                                    <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="peso" class="form-label">Peso</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="peso" name="peso" placeholder="Ingrese el peso en KG (89.5 KG)" onChange="calcularIMC()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="imc" class="form-label">IMC</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="imc" name="imc" placeholder="Se calcula automaticamente">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="edad_met" class="form-label">Edad Metabolica</label>
                                                <input type="text"  class="form-control form-control-sm" id="edad_met" name="edad_met" placeholder="Ingrese la edad metabolica">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="cintura" class="form-label">Cintura</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="cintura" name="cintura" placeholder="Ingrese la cantidad en CM"  onChange="ICC()"  required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="cadera" class="form-label">Cadera</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="cadera" name="cadera" placeholder="Ingrese la cantidad en CM" onChange="ICC()" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="icc" class="form-label">ICC</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="icc" name="icc" placeholder="Cadera/Cintura" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="porc_gra" class="form-label">Porcentaje Grasa</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="porc_gra" name="porc_gra" placeholder="ejemplo 25.5" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="porc_musc" class="form-label">Porcentaje Musc</label>
                                                <input type="number" step="any" class="form-control form-control-sm" id="porc_musc" name="porc_musc" placeholder="ejemplo 25.5" required>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="fech_ult_covid" class="form-label" >Fecha últ prueba covid</label>
                                                <input type="date" class="form-control form-control-sm" id="fech_ult_covid" name="fech_ult_covid">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="fech_ult_anti" class="form-label" >Fecha últ prueba antidoping</label>
                                                <input type="date" class="form-control form-control-sm" id="fech_ult_anti" name="fech_ult_anti">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="fech_ult_alch" class="form-label" >Fecha ult prueba de alcohol</label>
                                                <input type="date" class="form-control form-control-sm" id="fech_ult_alch" name="fech_ult_alch">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="presion" class="form-label">Presión</label>
                                                <input type="text" class="form-control form-control-sm" id="presion" name="presion" placeholder="Ejemplo: 120/80" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="glucosa" class="form-label">Glucosa</label>
                                                <input type="text" class="form-control form-control-sm" id="glucosa" name="glucosa" placeholder="ingresar Cantidad en mg/dl" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="observaciones" class="form-label">Observaciones</label>
                                                <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" name="observaciones" rows="1" required></textarea>
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
    <script async src="../../static/js/RecursosHumano/expcli_expediente_clinico_create.js"></script>
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