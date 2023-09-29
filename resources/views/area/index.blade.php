@extends('plantilla')
@section('content')
    <div class="container-fluid">
        <div class="row" style="padding: 45px;font-family: 'Oswald', sans-serif;
        fint-size: 48px; color:black;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Area') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('areas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Nueva Area') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="areas">
                                <thead class="thead">
                                    <tr>
                                        <th style="text-align:center"  >No</th>

                                        <th style="text-align:center"  >Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($areas as $area)
                                        <tr>
                                            <td style="text-align:center"   >{{$area->id}}</td>

                                            <td style="text-align:center;">{{ $area->nombre }}</td>

                                            <td style="text-align:right">
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('areas.edit', $area->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                <button type="submit" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#modalCarrerass{{$area->id}}">
                                                    <i class="fa-solid fa-circle-plus"></i>
                                                    Eliminar
                                                </button>
                                                <div class="modal fade" id="modalCarrerass{{$area->id}}">
                                                    <!-- Contenido del modal -->
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <form action="{{ route('areas.destroy', $area->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="alert alert-primary" role="alert">
                                                                        ¿Deseas eliminar la area?
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                    </div>
                                                                    <div class="d-grid col-6 mx-auto">
                                                                        <button type="submit"
                                                                            class="btn btn-danger btn-sm"><i
                                                                                class="fa fa-fw fa-trash"></i>
                                                                            {{ __('eliminar') }}</button>
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
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
                    </script>
                    
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script>
                    new DataTable('#areas', {
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
                            
                        }
                        
                    });
                </script>
                @endsection
