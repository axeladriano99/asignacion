@extends('plantilla')
@section('content')
    <div class="card-body" style="padding: 45px;font-family: 'Oswald', sans-serif;
fint-size: 48px; color:black; ">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Estado') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('estados.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
                                {{ __('Crear Nuevo Estado') }}
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
                <table class="table" id="estado">
                    <thead class="thead">
                        <tr>
                            <th>id</th>
                            <th  style="text-align: center" >Nombre</th>
                            <th style="text-align: right; padding-right: 50px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estados as $estado)
                            <tr>
                                <td>{{$estado->id }}</td>
                                <td style="text-align: center">{{ $estado->name }}</td>
    
                                <td style="text-align:right">
    
                                    <a class="btn btn-sm btn-success" href="{{ route('estados.edit', $estado->id) }}"><i
                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                    <button type="submit" class="btn btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#modalCarreras{{ $estado->id }}">
                                        <i class="fa-solid fa-circle-plus"></i>
                                        Eliminar
                                    </button>
                                    <div class="modal fade" id="modalCarreras{{ $estado->id }}">
                                        <!-- Contenido del modal -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <form action="{{ route('estados.destroy', $estado->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="alert alert-primary" style="text-align:left" role="alert">
                                                            ¿Deseas eliminar el estado?
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


                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script>
                    new DataTable('#estado', {
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
