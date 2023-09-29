@extends('plantilla')
@section('content')
    @role('administrador')
        <div class="container-fluid">
            <div class="row "
                style="padding: 45px;font-family: 'Oswald', sans-serif;
            fint-size: 48px; color:black;">
                <div class="col-sm-12 ">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center; width=100%;">

                                <span id="card_title">
                                    {{ __('Usuarios') }}
                                </span>

                                <div class="float-right">
                                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Crear Nuevos Usuario') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if (isset($data))
                        <!-- Mostrar los datos de $data aquí -->
                    @else
                        <!-- Mensaje de que no hay datos disponibles -->
                    @endif
                    <div class="card-body"  >
                        <div class="table-responsive" >
                            <table class="table" id="users">
                                <thead class="thead">

                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Email</th>
                                            <th>Dni</th>
                                            <th>Cargo</th>
                                            <th>Area</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->apellidoPaterno }}</td>
                                                <td>{{ $user->apellido_Materno }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->DNI }}</td>
                                                <td>{{ $user->cargo }}</td>
                                                <td>{{ $user->idEstado }}</td>
                                                <td>{{ $user->area->nombre }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('users.edit', $user->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    <button type="submit" class="btn btn-dark" data-bs-toggle="modal"
                                                        data-bs-target="#modalCarreras{{ $user->id }}">
                                                        <i class="fa-solid fa-circle-plus"></i>
                                                        Eliminar
                                                    </button>
                                                    <div class="modal fade" id="modalCarreras{{ $user->id }}">
                                                        <!-- Contenido del modal -->
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div class="alert alert-primary" role="alert">
                                                                            ¿Deseas eliminar al usuario?
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                        </div>
                                                                        <div class="d-grid col-6 mx-auto">
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"><i
                                                                                    class="fa fa-fw fa-trash"></i>
                                                                                {{ __('Delete') }}</button>
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
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="thead">
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Name</th>
                                                            <th>Apellido Paterno</th>
                                                            <th>Apellido Materno</th>
                                                            <th>Email</th>
                                                            <th>Dni</th>
                                                            <th>Cargo</th>
                                                            <th>Area</th>
                                                            <th >Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                            <tr>
                                                                <td> $user->id }}</td>
                                                                <td> $user->name }}</td>
                                                                <td> $user->apellidoPaterno }}</td>
                                                                <td> $user->apellido_Materno }}</td>
                                                                <td> $user->email }}</td>
                                                                <td> $user->DNI }}</td>
                                                                <td> $user->cargo }}</td>
                                                                <td> $user->idEstado }}</td>
                                                                <td>$user->area->name}}</td>

                                                                <td>
                                                                   
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                            -->

                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
            <script>
                    new DataTable('#users', {
                        responsive: true,
                        autoWidth: true,
                        "language": {
                            "lengthMenu": "Mostrar _MENU_ registros en página",
                            "zeroRecords": "Nada encontrado - disculpa",
                            "info": "Mostrando la página _PAGE_ de _PAGES_",
                            "infoEmpty": "No hay registros disponibles",
                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                            'search': "Buscar:",
                            'paginate': {
                                'next': 'Siguiente'
                            }
                        }
                    });
                });
            </script>            
    @endsection
@endrole
