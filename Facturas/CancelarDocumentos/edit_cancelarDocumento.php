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
                            <p>Facturación/Cancelar documentos/Crear</p>
                            <a class="btn btn-primary btn-sm " href="../CancelarDocumentos/cancelarDocumento.php"><i class="fa fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-sm-12">
                        <div class="row">
                            <div class="col col-sm-12 table-responsive">
                                <div>
                                    <h2 style="text-align: center;">Editar cancelación de documentos</h2>
                                    <small>Campos de caracter obligatorio(*)</small>
                                </div>

                                <div>
                                    <form action="../CancelarDocumentos/back/update_cancelacionDocumentos.php" method="post" id="mi_formulario">
                                        <div class="row">
                                            <div class="col col-sm-12">
                                                <h2>Datos generales</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                <input type="hidden" class="form-control" id="id_cd" name="id_cd"  readonly>
                                                    <label for="emp" class="form-label">Empresa(*)</label>
                                                    <select class="form-select" aria-label="seleccione empresa" id="emp" name="emp" required>
                                                        <option value="" selected>Seleccione empresa</option>
                                                        <option value="GRACOIL">GRACOIL</option>
                                                        <option value="INTER">INTER</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="fecha_solic" class="form-label">Fecha Solicitud</label>
                                                    <input type="date" class="form-control" id="fecha_solic" name="fecha_solic"  readonly>
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="demp_solic" class="form-label">Departamento que solicita(*)</label>
                                                    <select class="form-select" aria-label="seleccione empresa" id="demp_solic" name="demp_solic" required>
                                                        <option value="" selected>Seleccione un departamento</option>
                                                        <option value="COMPRAS">COMPRAS</option>
                                                        <option value="CONTABILIDAD">CONTABILIDAD</option>
                                                        <option value="FACTURACION">FACTURACION</option>
                                                        <option value="INVENTARIOS">INVENTARIOS</option>
                                                        <option value="VENTAS">VENTAS</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-12">
                                                <label for="desc_mot">Descripcion del motivo(*)</label>
                                                <textarea class="form-control" rows="2" id="desc_mot" name="desc_mot"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-12">
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="tip_mov" class="form-label">Tipo de movimiento(*)</label>
                                                    <select class="form-select" aria-label="seleccione empresa" id="tip_mov" name="tip_mov" required>
                                                        <option value="" selected>Seleccione un tipo de movimiento</option>
                                                        <option value="NOTA DE CRÉDITO FISCAL">NOTA DE CRÉDITO FISCAL</option>
                                                        <option value="NOTA DE CRÉDITO NO RELEVANTE">NOTA DE CRÉDITO NO RELEVANTE</option>
                                                        <option value="CANCELACION DE FACTURA">CANCELACION DE FACTURA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-12">
                                                <h2>Datos de Documentos a modificar</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="nom_clie" class="form-label">Nombre del cliente(*)</label>
                                                    <input type="text" class="form-control" id="nom_clie" name="nom_clie" required>
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="num_doc" class="form-label">Número de documento(*)</label>
                                                    <input type="text" class="form-control" id="num_doc" name="num_doc" required>
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="fec_doc" class="form-label">Fecha del Documento(*)</label>
                                                    <input type="date" class="form-control" id="fec_doc" name="fec_doc" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="mon_doc" class="form-label">Monto del documento(*)</label>
                                                    <input type="number" class="form-control" id="mon_doc" name="mon_doc" step="any"  required>
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="fol_fisc_afect" class="form-label">Folio Fiscal por afectar(*)</label>
                                                    <input type="text" class="form-control" id="fol_fisc_afect" name="fol_fisc_afect" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-12">
                                                <h2>Datos de la nota de credito</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="num_doc_cred" class="form-label">Número de documento</label>
                                                    <input type="text" class="form-control" id="num_doc_cred" name="num_doc_cred" >
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="fec_doc_cred" class="form-label">Fecha del Documento</label>
                                                    <input type="date" class="form-control" id="fec_doc_cred" name="fec_doc_cred" >
                                                </div>
                                            </div>
                                            <div class="col col-sm-4">
                                                <div class="mb-3">
                                                    <label for="mon_doc_cred" class="form-label">Monto del documento</label>
                                                    <input type="number" class="form-control" id="mon_doc_cred" name="mon_doc_cred" step="any">
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
    <script async src="../../static/js/Facturacion/fact_cancelar_doc_edit.js"></script>
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