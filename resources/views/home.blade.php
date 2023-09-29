@extends('plantilla')
@section('content')
    @role('tecnico')
        <div class="col-12" style="padding: 45px;font-family: 'Oswald', sans-serif;
        fint-size: 48px; color:black; ">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tareas sin iniciadas</h6>
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
                                        <a class="btn btn-sm btn-success" href="{{ route('tareas.edit', $tareas->id) }}"><i
                                                class="fa fa-fw fa-edit"></i>
                                            {{ __('Edit') }}</a>

                                        <button type="submit" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#modalIniciar{{ $tareas->id }}">
                                            <i class="fa-solid fa-circle-plus"></i>
                                            Cambiar a
                                            Iniciar
                                        </button>
                                        <div class="modal fade" id="modalIniciar{{ $tareas->id }}">
                                            <!-- Contenido del modal -->
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <label class="h5" id="titulo_modal">Añadir
                                                            carrera</label>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form name="frmCarrerasxx" id="frmCarrerasxx" method="POST"
                                                            action="{{ url('home', [$tareas->id]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="alert alert-primary" role="alert">
                                                                ¿Deseas cambiar el estado a
                                                                iniciado?
                                                            </div>
                                                            <div class="input-group mb-3">
                                                            </div>
                                                            <div class="d-grid col-6 mx-auto">
                                                                <button type="submit" class="btn btn-success"><i
                                                                        class="fa-solid fa-floppy-disk"></i>
                                                                    Cambiar a iniciado</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="btnCerrar" class="btn btn-secondary"
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
    @endrole
    @role('tecnico')
        <div class="col-12" style="padding: 45px;font-family: 'Oswald', sans-serif;
        fint-size: 48px; color:black; ">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tareas iniciadas</h6>
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
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('tareas.edit', $tareas->id) }}"><i
                                                class="fa fa-fw fa-edit"></i>
                                            {{ __('Edit') }}</a>
                                        <button type="submit" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#modalCarreras{{ $tareas->id }}">
                                            <i class="fa-solid fa-circle-plus"></i>
                                            Cambiar a
                                            terminado
                                        </button>
                                        <div class="modal fade" id="modalCarreras{{ $tareas->id }}">
                                            <!-- Contenido del modal -->
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <form id="frmCarrerasxx" method="POST"
                                                            action="{{ url('home', [$tareas->id]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="alert alert-primary" role="alert">
                                                                ¿Deseas cambiar el estado a
                                                                terminado?
                                                            </div>
                                                            <div class="input-group mb-3">
                                                            </div>
                                                            <div class="d-grid col-6 mx-auto">
                                                                <button type="submit" class="btn btn-success"><i
                                                                        class="fa-solid fa-floppy-disk"></i>
                                                                    Cambiar a Terminado</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="btnCerrar" class="btn btn-secondary"
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
    @endrole
    @role('tecnico')
        <div class="col-12" style="padding: 45px;font-family: 'Oswald', sans-serif;
        fint-size: 48px; color:black; ">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tareas Terminadas</h6>
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
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{ route('tareas.edit', $tareas->id) }}"><i
                                                class="fa fa-fw fa-edit"></i>
                                            {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    @endrole
    @role('administrador')
        <div class="page-header">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=""></a></li>

                </ol>
            </nav>
        </div>
        <div class="row-lg-12-mg-12"
            style="padding: 45px;font-family: 'Oswald', sans-serif;
        fint-size: 48px; color:black; ">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <h3 class="page-title">Lista de usuarios registrados con su lista de tareas </h3>
                        </h4>
                        <p class="card-description">

                        <div class="badge bg-primary text-wrap">

                            PERSONAL ADMINISTRATIVO
                        </div>
                        </p>

                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach ($personal_sistemas as $personal_sistema)
                                <li class="nav-item" role="presentation">
                                    <button onclick="IniciarDatatable({{ $personal_sistema->id }})" class="nav-link" id="{{ $personal_sistema->name }}" data-bs-toggle="tab"
                                        data-bs-target="#{{ $personal_sistema->name }}-pane" type="button" role="tabpanel"
                                        aria-controls="{{ $personal_sistema->name }}-pane"
                                        aria-selected="false">{{ $personal_sistema->name }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </ul>

                    <div class="tab-content " id="myTabContent">
                        @foreach ($personal_sistemas as $personal_sistema)
                            <div class="tab-pane fade" id="{{ $personal_sistema->name }}-pane" role="tabpanel" aria-labelledby="{{ $personal_sistema->name }}" tabindex="0">
                                {{ $personal_sistema->name }}
                                <div class="row" width="100%">
                                    <div class="table-responsive">
                                        <table class="table" width="100%" style="margin: 10px; padding: 10px; color: black"  id="tareas{{ $personal_sistema->id }}" style="width: 100%">
                                            <thead bgcolor="#1136A9">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Fecha inicio</th>
                                                    <th>Fecha creacion</th>
                                                    <th>Descripcion</th>
                                                    <th>Estado</th>
                                                    <th>Creador</th>

                                                    <!-- Nueva columna para los botones -->
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="table-responsive" style="margin: 10px; padding: 10px; width: 100%">
                                    <table class="table" width="100%" style="margin: 10px; padding: 10px; color: black"
                                        id="tareass{{ $personal_sistema->id }}" style="width: 100%">
                                        <thead bgcolor="#1136A9">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha inicio</th>
                                                <th>Fecha creacion</th>
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Creador</th>
                                                <!-- Nueva columna para los botones -->
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="table-responsive" style="margin: 10px; padding: 10px; width: 100%;">
                                    <table class="table" width="100%" style="margin: 10px; padding: 10px; color: black"
                                        id="tareasss{{ $personal_sistema->id }}" style="width: 100%">
                                        <thead bgcolor="#1136A9">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha inicio</th>
                                                <th>Fecha creacion</th>
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Creador</th>
                                                <!-- Nueva columna para los botones -->
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>
    @endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        function IniciarDatatable(idTabla) {
            $("#tareas" + idTabla).dataTable().fnDestroy();
            new DataTable('#tareas' + idTabla, {
                "ajax": "{{ route('ListarTareaUsuario') }}?id=" + idTabla,
                "columns": [{
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
                    }
                ],
                responsive: true,
                autoWidth: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros en pagina",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la pagina  _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': "Buscar:",
                    'paginate': {
                        'next': 'Siguiente'
                    }
                }
            });
            $("#tareass" + idTabla).dataTable().fnDestroy();
            new DataTable('#tareass' + idTabla, {
                "ajax": "{{ route('tabla2') }}?id=" + idTabla,
                "columns": [{
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
                    }
                ],
                responsive: true,
                autoWidth: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros en pagina",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la pagina  _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
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
                    }
                ],



                responsive: true,
                autoWidth: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros en pagina",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la pagina  _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': "Buscar:",
                    'paginate': {
                        'Previous': 'Anterior',
                        'next': 'Siguiente'
                    }
                }
            });

        }
    </script>
@endrole
@endsection
