<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Gracoil</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../static/css/style2.css" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h5>MGS</h5><br />
                <a class="link-perfil" href="./Perfil/miPerfil.php/"><i class="fas fa-user"></i> Nombre del usuario</a>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#Dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        Dashboard</a>
                    <ul class="collapse list-unstyled" id="Dashboard">
                        <li>
                            <a href="/Dashboard/dashboard_gen.html">Dashboard General</a>
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
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-inverse fixed-top" style="background-color: #3e4144;">
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
                                <a class="nav-link link-nav-top" href="../../home.html" style="color: white; margin: 0px 0px 0px 5px;">Inicio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid" style="margin-top: 50px; background-color: rgb(255, 255, 255); padding: 1rem; border-radius: 8px; box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.634);">

                <div class="row">
                    <div class="col col-sm-12">
                        <h1>Mi perfil</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-sm-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Datos Personales</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fas fa-user"></i><b> Nombre: </b>Saúl</li>
                                <li class="list-group-item"><i class="fas fa-user"></i><b> Primer Apellido: </b>Juárez</li>
                                <li class="list-group-item"><i class="fas fa-user"></i><b> Segundo Apellido: </b>Martínez</li>
                                <li class="list-group-item"><i class="fas fa-user"></i><b> Teléfono: </b>4427717652</li>
                                <li class="list-group-item"><i class="fas fa-user"></i><b>Correo: </b>saurismartinez@gmail.com</li>
                            </ul>
                            <div class="card-body" style="display: flex; justify-content: right;">
                                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Editar informacion</button>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Datos de empleado</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fas fa-user-tie"></i><b> Área: </b>Sistemas</li>
                                <li class="list-group-item"><i class="fas fa-user-tie"></i><b> Número de empleado: </b>117</li>
                                <li class="list-group-item"><i class="fas fa-user-tie"></i><b> Segundo Apellido: </b>Martínez</li>
                                <li class="list-group-item"><i class="fas fa-phone"></i><b> Teléfono empleado: </b>4427717652</li>
                                <li class="list-group-item"><i class="fas fa-phone"></i><b> Extension: </b>117</li>
                                <li class="list-group-item"><i class="fas fa-envelope"></i><b>Correo empleado: </b>saurismartinez@gmail.com</li>
                                <li class="list-group-item"><i class="fas fa-phone"></i><b> Extension: </b>117</li>
                            </ul>
                            <div class="card-body" style="display: flex; justify-content: right;">
                                <button class="btn btn-secondary"><i class="fa fa-edit"></i> Editar informacion</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./static/js/home.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>