@role('administrador')
@extends('plantilla')
@section('content')
    <div class="row" style="padding: 45px;font-family: 'Oswald', sans-serif;
    fint-size: 48px; color:black; ">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Crear estado') }}</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('estados.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('estado.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@endrole