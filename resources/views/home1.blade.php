<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SISTEMA DE ASIGNACION </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de tareas</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="../../index.html"><img src="../../assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img
                        src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="../../assets/images/faces/face15.jpg"
                                    alt="">
                                <h4 style="color: aliceblue;">{{ Auth::user()->name }}</h4>
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                            </div>
                        </div>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    @role('administrador')
                        <a class="nav-link" href="{{ url('users') }}">
                            <span class="menu-icon">
                                <i class="mdi mdi-speedometer"></i>
                            </span>
                            <span class="menu-title">Crear usuario</span>
                        </a>
                    @endrole
                </li>

                <li class="nav-item menu-items">
                    @role('administrador')
                        <a class="nav-link" href="{{ url('tareas') }}">
                            <span class="menu-icon">
                                <i class="mdi mdi-speedometer"></i>
                            </span>
                            <span class="menu-title">Crear tarea</span>
                        </a>
                    @endrole
                </li>

                <li class="nav-item menu-items">
                    @role('administrador')
                        <a class="nav-link" href="{{ url('estados') }}" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-icon">
                                <i class="mdi mdi-laptop"></i>
                            </span>
                            <span class="menu-title">Crear estado</span>
                            <i class="menu-arrow"></i>
                        </a>
                    @endrole
                </li>
                <li class="nav-item menu-items">
                    @role('administrador')
                        <a class="nav-link" href="{{ url('areas') }}">
                            <span class="menu-icon">
                                <i class="mdi mdi-playlist-play"></i>
                            </span>
                            <span class="menu-title">Crear Area</span>
                        </a>
                    @endrole
                </li>

                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank
                                Page
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register
                            </a></li>
                    </ul>
                </div>
                </li>
                </li>
            </ul>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href=""><img
                            src="../../assets/images/logo-mini.svg" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <ul class="navbar-nav w-100">
                        <div id="app">
                            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                                <div class="container">
                                    <a class="navbar-brand">
                                        {{ config('app.name', 'SISTEMA DE ASIGNACION DE TAREAS') }}
                                    </a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent"
                                        aria-controls="navbarSupportedContent" aria-expanded="false"
                                        aria-label="{{ __('Toggle navigation') }}">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown d-none d-lg-block">
                            @role('administrador')
                                <a class="nav-link btn btn-success create-new-button" href="{{ url('users') }}">Crear
                                    nuevo usuario</a>
                            @endrole
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="createbuttonDropdown">
                                <h6 class="p-3 mb-0">Projects</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">


                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-file-outline text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">

                                        <p class="preview-subject ellipsis mb-1">Crear Usuario</p>
                                    </div>
                                </a>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-web text-info"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">UI Development</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-layers text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject ellipsis mb-1">Software Testing</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">See all projects</p>
                            </div>
                        </li>
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="#">
                                <i class="mdi mdi-view-grid"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown border-left">
                            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="count bg-success"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">

                        </li>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0"></h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-dark rounded-circle">
                                        <i class="mdi mdi-calendar text-success"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <p class="preview-subject mb-1"></p>
                                    <p class="text-muted ellipsis mb-0"> </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item">
                                </a>
                            </div>
                        </div>
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                </div>
                            </div>
                        </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="../../assets/images/faces/face15.jpg"
                                        alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name"> {{ Auth::user()->name }}
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <div class="">
                                    <i class="mdi mdi"></i>
                                </div>

                                </a>
                                <div class="">
                                    <div class="">
                                        <i class="mdi "></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf</p>

                                    </a>
                                </div>
                                </a>

                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none " type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            @role('tecnico')
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Table</h4>
                                <p class="card-description">
                                <div class="badge bg-primary text-wrap" style="width: 6rem;">
                                    TAREAS SIN INICIAR
                                </div>
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nombre</th>
                                                <th>Fecha de Inicio</th>
                                                <th>Fecha de Creación</th>
                                                <th>Fecha de Término</th>
                                                <th>Descripción</th>
                                                <th>Estado</th>
                                                <th>Creador</th>
                                                <th>Acciones</th>
                                                <!-- Nueva columna para los botones -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tareas_sin_iniciar as $tareas)
                                                <tr>
                                                    <td>{{ $tareas->id }}</td>
                                                    <td>{{ $tareas->nombre }}</td>
                                                    <td>{{ $tareas->Fecha_inicio }}</td>
                                                    <td>{{ $tareas->fecha_termino }}</td>
                                                    <td>{{ $tareas->fecha_creacion }}</td>
                                                    <td>{{ $tareas->descripcion }}</td>
                                                    <td>{{ $tareas->estados_id }}</td>
                                                    <td>{{ $tareas->idCreador }}</td>
                                                    <td>
                                                        <button type="submit" class="btn btn-dark"
                                                            data-bs-toggle="modal" data-bs-target="#modalIniciar">
                                                            <i class="fa-solid fa-circle-plus"></i>
                                                            Cambiar a
                                                            Iniciar
                                                        </button>
                                                        <div class="modal fade" id="modalIniciar">
                                                            <!-- Contenido del modal -->
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <label class="h5" id="titulo_modal">Añadir
                                                                            carrera</label>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form name="frmCarrerasxx" id="frmCarrerasxx"
                                                                            method="POST"
                                                                            action="{{ url('home', [$tareas->id]) }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="alert alert-primary"
                                                                                role="alert">
                                                                                ¿Deseas cambiar el estado a
                                                                                iniciado?
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                            </div>
                                                                            <div class="d-grid col-6 mx-auto">
                                                                                <button type="submit"
                                                                                    class="btn btn-success"><i
                                                                                        class="fa-solid fa-floppy-disk"></i>
                                                                                    Cambiar a iniciado</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="btnCerrar"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Basic Table</h4>
                                    <p class="card-description">
                                    <div class="badge bg-primary text-wrap" style="width: 6rem;">
                                        TAREAS inicidas
                                    </div>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>nombre</th>
                                                    <th>Fecha de Inicio</th>
                                                    <th>Fecha de Creación</th>
                                                    <th>Fecha de Término</th>
                                                    <th>Descripción</th>
                                                    <th>Estado</th>
                                                    <th>Creador</th>
                                                    <th>Acciones</th>
                                                    <th> </th>
                                                    <!-- Nueva columna para los botones -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tareas_iniciadas as $tareas)
                                                    <tr>
                                                        <td>{{ $tareas->id }}</td>
                                                        <td>{{ $tareas->nombre }}</td>
                                                        <td>{{ $tareas->Fecha_inicio }}</td>
                                                        <td>{{ $tareas->fecha_termino }}</td>
                                                        <td>{{ $tareas->fecha_creacion }}</td>
                                                        <td>{{ $tareas->descripcion }}</td>
                                                        <td>{{ $tareas->estados_id }}</td>
                                                        <td>{{ $tareas->idCreador }}</td>
                                                        <td><a class="btn btn-sm btn-success"
                                                                href="{{ route('tareas.edit', $tareas->id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        </td>
                                                        <button type="submit" class="btn btn-dark"
                                                            data-bs-toggle="modal" data-bs-target="#modalCarreras">
                                                            <i class="fa-solid fa-circle-plus"></i>
                                                            Cambiar a
                                                            terminado
                                                        </button>
                                                        <div class="modal fade" id="modalCarreras">
                                                            <!-- Contenido del modal -->
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <form id="frmCarrerasxx" method="POST"
                                                                            action="{{ url('home', [$tareas->id]) }}">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="alert alert-primary"
                                                                                role="alert">
                                                                                ¿Deseas cambiar el estado a
                                                                                terminadoooooooo?
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                            </div>
                                                                            <div class="d-grid col-6 mx-auto">
                                                                                <button type="submit"
                                                                                    class="btn btn-success"><i
                                                                                        class="fa-solid fa-floppy-disk"></i>
                                                                                    Cambiar a Terminado</button>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="btnCerrar"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Basic Table</h4>
                                        <p class="card-description">
                                        <div class="badge bg-primary text-wrap" style="width: 6rem;">
                                            TAREAS SIN INICIAR
                                        </div>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>nombre</th>
                                                        <th>Fecha de Inicio</th>
                                                        <th>Fecha de Creación</th>
                                                        <th>Fecha de Término</th>
                                                        <th>Descripción</th>
                                                        <th>Estado</th>
                                                        <th>Creador</th>
                                                        <!-- Nueva columna para los botones -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tareas_terminadas as $tareas)
                                                        <tr>
                                                            <td>{{ $tareas->id }}</td>
                                                            <td>{{ $tareas->nombre }}</td>
                                                            <td>{{ $tareas->Fecha_inicio }}</td>
                                                            <td>{{ $tareas->fecha_termino }}</td>
                                                            <td>{{ $tareas->fecha_creacion }}</td>
                                                            <td>{{ $tareas->descripcion }}</td>
                                                            <td>{{ $tareas->estados_id }}</td>
                                                            <td>{{ $tareas->idCreador }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endrole

                        @role('administrador')
                            <div class="main-panel">
                                <div class="content-wrapper">
                                    <div class="page-header">
                                        <h3 class="page-title"> Tabla de tareas </h3>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href=""></a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Basic Table</h4>
                                                    <p class="card-description">
                                                    <div class="badge bg-primary text-wrap">
                                                        PERSONAL ADMINITRATIVO
                                                    </div>
                                                    </p>

                                                </div>

                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        @foreach ($personal_sistemas as $personal_sistema)
                                                            <li class="nav-item" role="presentation">
                                                                <button
                                                                    onclick="IniciarDatatable({{ $personal_sistema->id }})"
                                                                    class="nav-link" id="{{ $personal_sistema->name }}"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#{{ $personal_sistema->name }}-pane"
                                                                    type="button" role="tab"
                                                                    aria-controls="{{ $personal_sistema->name }}-pane"
                                                                    aria-selected="false">{{ $personal_sistema->name }}</button>
                                                            </li>
                                                        @endforeach
                                                    </ul>


                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    @foreach ($personal_sistemas as $personal_sistema)
                                                        <div class="tab-pane fade"
                                                            id="{{ $personal_sistema->name }}-pane" role="tabpanel"
                                                            aria-labelledby="{{ $personal_sistema->name }}"
                                                            tabindex="0">{{ $personal_sistema->name }}
                                                            <div class="table-responsive">
                                                                <table class="table"
                                                                    id="tareas{{ $personal_sistema->id }}"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>id</th>
                                                                            <th>nombre</th>
                                                                            <th>Fecha_inicio</th>
                                                                            <th>fecha_creacion</th>
                                                                            <th>descripcion</th>
                                                                            <th>idEstado</th>
                                                                            <th>idCreador</th>
                                                                            <th>idUsuario</th>
                                                                            <!-- Nueva columna para los botones -->
                                                                        </tr>
                                                                    </thead>
                                                                </table>

                                                            </div>

                                                            <div class="table-responsive">
                                                                <table class="table"
                                                                    id="tareass{{ $personal_sistema->id }}"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>id</th>
                                                                            <th>nombre</th>
                                                                            <th>Fecha_inicio</th>
                                                                            <th>fecha_creacion</th>
                                                                            <th>descripcion</th>
                                                                            <th>idEstado</th>
                                                                            <th>idCreador</th>
                                                                            <th>idUsuario</th>
                                                                            <!-- Nueva columna para los botones -->
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table class="table"
                                                                    id="tareasss{{ $personal_sistema->id }}"
                                                                    style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>id</th>
                                                                            <th>nombre</th>
                                                                            <th>Fecha_inicio</th>
                                                                            <th>fecha_creacion</th>
                                                                            <th>descripcion</th>
                                                                            <th>idEstado</th>
                                                                            <th>idCreador</th>
                                                                            <th>idUsuario</th>
                                                                            <!-- Nueva columna para los botones -->
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="tab-content" id="myTabContent">
                                                    @foreach ($personal_sistemas as $personal_sistema)
                                                        <div class="tab-pane fade"
                                                            id="{{ $personal_sistema->name }}-pane" role="tabpanel"
                                                            aria-labelledby="{{ $personal_sistema->name }}"
                                                            tabindex="0">{{ $personal_sistema->name }}

                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                            </ul>
                                            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                                            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                                            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                                            <script>
                                                /*
                                                                                                                                                for (let i = 1; i < 3; i++) {
                                                                                                                                                    new DataTable('#tareas-' + i, {
                                                                                                                                                        responsive: true,
                                                                                                                                                        autoWidth: false,
                                                                                                                                                        "language": {
                                                                                                                                                          "lengthMenu": "Mostrar _MENU_ registros en pagina",
                                                                                                                                                          "zeroRecords": "Nada encontrado - disculpa",
                                                                                                                                                          "info": "Mostrando la pagian  _PAGE_ de _PAGES_",
                                                                                                                                                          "infoEmpty": "No records available",
                                                                                                                                                          "infoFiltered": "(filtrado de _MAX_ registros totales)",
                                                                                                                                                          'search': "Buscar:",
                                                                                                                                                          'paginate': {
                                                                                                                                                            'next': 'Siguiente'
                                                                                                                                                          }
                                                                                                                                                      }
                                                                                                                                                    });
                                                                                                                                                }*/

                                                function prueba(params) {
                                                    alert('dasda');
                                                }

                                                function IniciarDatatable(idTabla) {
                                                    $("#tareass" + idTabla).dataTable().fnDestroy();
                                                    new DataTable('#tareass' + idTabla, {
                                                        "ajax": "{{ route('tabla2') }}?id=" + idTabla,
                                                        "columns": [{
                                                                data: 'id'
                                                            },
                                                            {
                                                                data: 'nombre'
                                                            },
                                                            {
                                                                data: 'Fecha_inicio'
                                                            },
                                                            {
                                                                data: 'fecha_creacion'
                                                            },
                                                            {
                                                                data: 'descripcion'
                                                            },
                                                            {
                                                                data: 'estados_id'
                                                            },
                                                            {
                                                                data: 'idCreador'
                                                            },
                                                            {
                                                                data: 'idUsuario'
                                                            }
                                                        ],



                                                        responsive: true,
                                                        autoWidth: false,
                                                        "language": {
                                                            "lengthMenu": "Mostrar _MENU_ registros en pagina",
                                                            "zeroRecords": "Nada encontrado - disculpa",
                                                            "info": "Mostrando la pagian  _PAGE_ de _PAGES_",
                                                            "infoEmpty": "No records available",
                                                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                                                            'search': "Buscar:",
                                                            'paginate': {
                                                                'next': 'Siguiente'
                                                            }
                                                        }

                                                    });
                                                    $("#tareas" + idTabla).dataTable().fnDestroy();
                                                    new DataTable('#tareas' + idTabla, {
                                                        "ajax": "{{ route('ListarTareaUsuario') }}?id=" + idTabla,
                                                        "columns": [{
                                                                data: 'id'
                                                            },
                                                            {
                                                                data: 'nombre'
                                                            },
                                                            {
                                                                data: 'Fecha_inicio'
                                                            },
                                                            {
                                                                data: 'fecha_creacion'
                                                            },
                                                            {
                                                                data: 'descripcion'
                                                            },
                                                            {
                                                                data: 'estados_id'
                                                            },
                                                            {
                                                                data: 'idCreador'
                                                            },
                                                            {
                                                                data: 'idUsuario'
                                                            }
                                                        ],



                                                        responsive: true,
                                                        autoWidth: false,
                                                        "language": {
                                                            "lengthMenu": "Mostrar _MENU_ registros en pagina",
                                                            "zeroRecords": "Nada encontrado - disculpa",
                                                            "info": "Mostrando la pagian  _PAGE_ de _PAGES_",
                                                            "infoEmpty": "No records available",
                                                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                                                            'search': "Buscar:",
                                                            'paginate': {
                                                                'next': 'Siguiente'
                                                            }
                                                        }
                                                    });

                                                    $("#tareasss" + idTabla).dataTable().fnDestroy();
                                                    new DataTable('#tareasss' + idTabla, {
                                                        "ajax": "{{ route('tabla3') }}?id=" + idTabla,
                                                        "columns": [{
                                                                data: 'id'
                                                            },
                                                            {
                                                                data: 'nombre'
                                                            },
                                                            {
                                                                data: 'Fecha_inicio'
                                                            },
                                                            {
                                                                data: 'fecha_creacion'
                                                            },
                                                            {
                                                                data: 'descripcion'
                                                            },
                                                            {
                                                                data: 'estados_id'
                                                            },
                                                            {
                                                                data: 'idCreador'
                                                            },
                                                            {
                                                                data: 'idUsuario'
                                                            }
                                                        ],



                                                        responsive: true,
                                                        autoWidth: false,
                                                        "language": {
                                                            "lengthMenu": "Mostrar _MENU_ registros en pagina",
                                                            "zeroRecords": "Nada encontrado - disculpa",
                                                            "info": "Mostrando la pagian  _PAGE_ de _PAGES_",
                                                            "infoEmpty": "No records available",
                                                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                                                            'search': "Buscar:",
                                                            'paginate': {
                                                                'next': 'Siguiente'
                                                            }
                                                        }

                                                    });
                                                }
                                            </script>
                                            <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endrole
</body>

</html>
