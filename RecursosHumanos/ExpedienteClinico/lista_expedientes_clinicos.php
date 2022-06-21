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
                            <p>Recursos Humanos/Expediente Clinico/Lista de expedientes clinicos</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <h2 style="text-align: center;">Lista de expedientes clinicos</h2>
                        <div style="display: flex; justify-content: center">
                            <form action="/action_page.php">
                                <div class="form-group" style="display: inline-block">
                                    <label for="fecha_inicio_filtro" style="cursor: pointer;">Fecha inicio</label>
                                    <input type="date" class="form-control" id="fecha_inicio_filtro" name="fecha_inicio_filtro" />
                                </div>
                                <div class="form-group" style="display: inline-block">
                                    <label for="fecha_fin_filtro" style="cursor: pointer;">Fecha fin</label>
                                    <input type="date" class="form-control" id="fecha_fin_filtro" name="fecha_fin_filtro" />
                                </div>
                                <button type="button" class="btn btn-danger btn-sm" onclick="filtrar_dato()"><i class="fa-solid fa-magnifying-glass"></i> Buscar </button>
                                <a type="button" class="btn btn-success btn-sm" href="../../RecursosHumanos/ExpedienteClinico/lista_expedientes_clinicos.php"><i class="fa-solid fa-table-list"></i> Todos</a>
                            </form>
                        </div>
                        <br>
                        <div >
                                <a href="../ExpedienteClinico/create_expediente_clinico.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Crear </a>
                        </div>
                        <div>
                            <h5 style="text-align: center" id="datosfiltro"></h5>
                        </div>
                        <br>
                        <div class="row" id="allDatosExpClinico">
                            <div class="col col-sm-12 table-responsive">
                                <table class="table table-hover table-bordered table-sm estilo_tabla" id="tablaListaExpClinico">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Alergias</th>
                                            <th>Desc alerg</th>
                                            <th>Talla</th>
                                            <th>Peso</th>
                                            <th>IMC</th>
                                            <th>Indice IMC</th>
                                            <th>Cintura</th>
                                            <th>Cadera</th>
                                            <th>icc</th>
                                            <th>Indice icc</th>
                                            <th>% Grasa</th>
                                            <th>% Músculo</th>
                                            <th>Edad Metabolica</th>
                                            <th>Fecha Ult Covid</th>
                                            <th>Fecha Ult Anti</th>
                                            <th>Fecha Ult Alco</th>
                                            <th>Presion</th>
                                            <th>Glucosa</th>
                                            <th>Observaciones</th>
                                            <th>Fecha Registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("../../includes/conexionG.php");
                                        $consulta = "SELECT HCE.id_hce, HCE.alergias, HCE.sexo, HCE.icc, HCE.desc_alerg, HCE.talla, HCE.peso, HCE.IMC, HCE.cintura, HCE.cadera, HCE.porc_gra, HCE.porc_musc, HCE.edad_met, HCE.fecha_ult_covid, HCE.fecha_ult_anti,  HCE.fecha_ult_alch, HCE.presion,  HCE.glucosa, HCE.Observaciones, HCE.fecha_regis,  HCE.id_emp, ERH.nom, ERH.ap1, ERH.ap2 FROM hist_clic_emple HCE JOIN empleados_rh ERH ON HCE.id_emp = ERH.id_emp;";
                                        $datos = mysqli_query($enlace, $consulta);
                                        while ($dato = mysqli_fetch_assoc($datos)) {
                                            //calcular indice IMC
                                            if ($dato['IMC'] < 18.5) {
                                                $texto =  'Peso Bajo';
                                            } else if ($dato['IMC'] >= 18.5 && $dato['IMC'] <= 24.9) {
                                                $texto = 'Normal';
                                            } else if ($dato['IMC'] >= 25  && $dato['IMC'] <= 29.9) {
                                                $texto = 'SobrePeso';
                                            } else if ($dato['IMC'] >= 30) {
                                                $texto = 'Obesidad';
                                            }
                                            //calcular indice ICC
                                            if (($dato['icc'] >= 0.71 && $dato['icc'] <= 0.84) && $dato['sexo'] == 'MUJER') {
                                                $indice_icc = 'Indice Normal';
                                            } else if ($dato['icc'] > 0.84  && $dato['sexo'] == 'MUJER') {
                                                $indice_icc = 'Posibilidad de riesgos cardiovasculares';
                                            } else if (($dato['icc'] >= 0.78 && $dato['icc'] <= 0.94) && $dato['sexo'] == 'HOMBRE') {
                                                $indice_icc = 'Indice Normal';
                                            } else if ($dato['icc'] > 0.94  && $dato['sexo'] == 'HOMBRE') {
                                                $indice_icc = 'Posibilidad de riesgos cardiovasculares';
                                            }

                                        ?>
                                            <tr>
                                                <td><?php echo $dato['nom']; ?> <?php echo $dato['ap1']; ?> <?php echo $dato['ap2']; ?></td>
                                                <td><?php echo $dato['alergias']; ?></td>
                                                <td><?php echo $dato['desc_alerg']; ?></td>
                                                <td><?php echo $dato['talla']; ?></td>
                                                <td><?php echo $dato['peso']; ?></td>
                                                <td><?php echo number_format($dato['IMC'], 2); ?></td>
                                                <td><?php echo $texto; ?></td>
                                                <td><?php echo $dato['cintura']; ?></td>
                                                <td><?php echo $dato['cadera']; ?></td>
                                                <td><?php echo $dato['icc'];  ?></td>
                                                <td><?php echo $indice_icc; ?></td>
                                                <td><?php echo $dato['porc_gra']; ?></td>
                                                <td><?php echo $dato['porc_musc']; ?></td>
                                                <td><?php echo $dato['edad_met']; ?></td>
                                                <td><?php echo $dato['fecha_ult_covid']; ?></td>
                                                <td><?php echo $dato['fecha_ult_anti']; ?></td>
                                                <td><?php echo $dato['fecha_ult_alch']; ?></td>
                                                <td><?php echo $dato['presion']; ?></td>
                                                <td><?php echo $dato['glucosa']; ?></td>
                                                <td><?php echo $dato['Observaciones']; ?></td>
                                                <td><?php echo $dato['fecha_regis']; ?></td>
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
                        </div>


                        <div class="row" style="display: none;" id="filterDatosExpCli">
                            <div class="col col-sm-12">
                                <table class="table table-hover table-bordered table-sm estilo_tabla" id="tablaListaExpClinicoFil">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Alergias</th>
                                            <th>Desc alerg</th>
                                            <th>Talla</th>
                                            <th>Peso</th>
                                            <th>IMC</th>
                                            <th>Cintura</th>
                                            <th>Cadera</th>
                                            <th>% Grasa</th>
                                            <th>% Músculo</th>
                                            <th>Edad Metabolica</th>
                                            <th>Fecha Ult Covid</th>
                                            <th>Fecha Ult Anti</th>
                                            <th>Fecha Ult Alco</th>
                                            <th>Presion</th>
                                            <th>Glucosa</th>
                                            <th>Observaciones</th>
                                            <th>Fecha Registro</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datostablaListaExpClinicoFil"></tbody>
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
    <script  src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script  src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script async src="../../static/js/RecursosHumano/expcli_expediente_clinico.js"></script>
    <!-- Popper.JS -->
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script  src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <!-- Links para dataTable -->
    <script  src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script  src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script  src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script  src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script  src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
    <script  src="https://cdn.datatables.net/plug-ins/1.10.24/api/average().js"></script>
    <script  src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script  src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
    <script  src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
</body>

</html>