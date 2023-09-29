@extends('plantilla')
@section('content')

<form method="POST" action="{{ route('estados.update', $estado->id) }}"  role="form" enctype="multipart/form-data">
    {{ method_field('PATCH') }}                              
    @csrf

    @include('estado.form')

</form>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src={{ asset('lib/chart/chart.min.js') }}></script>
    <script src={{ asset('lib/easing/easing.min.js') }}></script>
    <script src={{ asset('lib/waypoints/waypoints.min.js') }}></script>
    <script src={{ asset('lib/owlcarousel/owl.carousel.min.js') }}></script>
    <script src={{ asset('lib/tempusdominus/js/moment.min.js') }}></script>
    <script src={{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}></script>
    <script src={{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    @endsection
