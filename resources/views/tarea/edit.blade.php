@extends('plantilla')
@section('content')
        <div class="">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Tarea</span>
                    </div>
                    <div class="card-body">
                        @if ($tarea)
                        <form method="POST" action="{{ route('tareas.update', $tarea->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('tarea.form')
                        </form>
                    @else
                        <p>Tarea no encontrada o no existe.</p>
                    @endif
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection