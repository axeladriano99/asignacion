@extends('plantilla')
@section('content')
    @role('administrador')
        <div class="container-fluid">
            <div class="row" style="padding: 45px;font-family: 'Oswald', sans-serif;
        fint-size: 48px; color:black;">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <span id="card_title">
                                    {{ __('Tarea') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('tareas.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Crear Tarea Nueva') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                       
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tareas">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Nombre</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Creacion</th>
                                            <th>Fecha Termino</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Creador</th>
                                            <th>Usuario Asignado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tareas as $tarea)
                                            <tr>
                                                <td>{{ $tarea->id }}</td>
                                                <td>{{ $tarea->nombre }}</td>
                                                <td>{{ $tarea->Fecha_inicio }}</td>
                                                <td>{{ $tarea->fecha_creacion }}</td>
                                                <td>{{ $tarea->fecha_termino }}</td>
                                                <td>{{ $tarea->descripcion }}</td>
                                                <td>{{ $tarea->idEstado }}</td>
                                                <td>{{ $tarea->users->name }}</td>
                                                <td>{{ $tarea->user->name }}</td>

                                                <td>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('tareas.edit', $tarea->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        <button type="submit" class="btn btn-dark" data-bs-toggle="modal"
                                                            data-bs-target="#modalCarreras{{$tarea->id}}">
                                                            <i class="fa-solid fa-circle-plus"></i>
                                                            Eliminar
                                                        </button>
                                                        <div class="modal fade" id="modalCarreras{{$tarea->id}}">
                                                            <!-- Contenido del modal -->
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                                                                            @csrf
                                                                        @method('DELETE')
                                                                            <div class="alert alert-primary" role="alert">
                                                                                ¿Deseas eliminar la tarea?
                                                                            </div>
                                                                            <div class="input-group mb-3">
                                                                            </div>
                                                                            <div class="d-grid col-6 mx-auto">
                                                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                                                    class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <script>
              new $.fn.dataTable('#tareas', {
    responsive: true,
    autoWidth: true,
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros en pagina",
        "zeroRecords": "Nada encontrado - disculpa",
        "info": "Mostrando la pagina  _PAGE_ de _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        'search': "Buscar:",
        'paginate': {
            'next': 'Siguiente'
        }
    },
    "columnDefs": [
        { "searchable": false, "targets": [0, 9] } // Excluir la primera y última columna de la búsqueda
    ]
});

            </script>
        @endsection
    @endrole
