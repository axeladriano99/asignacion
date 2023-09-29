@role('administrador')
@extends('plantilla')
@section('content')
        <div class="row" style="padding: 45px;font-family: 'Tangerine', serif;
        fint-size: 48px; color:black;">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Area</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('areas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('area.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endrole