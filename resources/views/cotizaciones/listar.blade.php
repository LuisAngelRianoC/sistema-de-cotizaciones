@extends('adminlte::page')

@section('title', 'Listado de Cotizaciones')

@section('content_header')
    <p></p>
@stop

@section('content')

    @if (session('mensaje'))
        <div class="alert alert-danger text-center">
            {{ session('mensaje') }}
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="card">
        <a href="{{ route('cotizaciones.registrar') }}" title="Agregar cotizacion" class="btn btn-primary">Agregar</a>

        <div class="card-body">
            <table class="table table-striped" id="tablaCotizaciones" data-route="{{ route('cotizaciones.listar') }}">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PRODUCTO</th>
                        <th>PLAZO</th>
                        <th>FECHA</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('css')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var cotizacionesRoute = $('#tablaCotizaciones').data('route');

            $('#tablaCotizaciones').DataTable({
                processing: true,
                serverSide: true,
                ajax: cotizacionesRoute,
                responsive: true,
                language: {
                    lengthMenu: "Mostrar _MENU_ registros",
                    zeroRecords: "No existen registros",
                    info: "Página _PAGE_ de _PAGES_",
                    infoEmpty: "Sin registros",
                    infoFiltered: "(filtrado de _MAX_ registros totales)",
                    search: "Buscar:",
                    paginate: {
                        next: 'Siguiente',
                        previous: 'Anterior'
                    }
                },
                columns: [
                    { data: "id_cotizacion" },
                    { data: "sku_producto" },
                    { data: "id_plazo" },
                    { data: "fecha_cotizacion" },
                    { data: "actions" },
                ],
            });
        });
    </script>
@stop
