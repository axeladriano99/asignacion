@extends('plantilla')
@section('content')
    @role('administrador')
        <div class="row">
            <div class="col-md-12" style="padding: 45px;font-family: 'Oswald', sans-serif;
            fint-size: 48px; color:black; ">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Usuario</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
@endrole