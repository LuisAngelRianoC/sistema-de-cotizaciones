@extends('adminlte::page')

@section('title', 'Registro de Cotización')

@section('content_header')
    <h1>Registro de Cotización</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="cotizacionForm" action="{{ route('cotizaciones.procesarRegistroCotizacion') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="control-label">Producto</label>
                        <select class="custom-select form-control mb-3" name="sku" id="selectProducto" required>
                            <option value="">Seleccione un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->sku }}" data-precio="{{ $producto->precio }}">
                                    {{ $producto->sku }} - {{ $producto->nombre_producto }}
                                </option>
                            @endforeach
                        </select>
                        @error('sku')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="control-label">Plazo</label>
                        <select class="custom-select form-control mb-3" name="id_plazo" id="selectPlazo" required>
                            <option value="">Seleccione un plazo</option>
                            @foreach ($plazos as $plazo)
                                <option value="{{ $plazo->id_plazo }}" data-tasa-normal="{{ $plazo->tasa_normal }}" data-tasa-puntual="{{ $plazo->tasa_puntual }}" data-duracion="{{ $plazo->duracion_semanas }}">
                                    {{ $plazo->id_plazo }} - {{ $plazo->descripcion_plazo }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_plazo')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Abono Normal</label>
                        <input type="text" class="form-control" id="abonoNormal" name="abono_normal" readonly>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Abono Puntual</label>
                        <input type="text" class="form-control" id="abonoPuntual" name="abono_puntual" readonly>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('cotizaciones.listar') }}" class="btn btn-danger">Regresar</a>
                        <button type="submit" class="btn btn-primary mr-3">Grabar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/estilo_select.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializa Select2 para los selectores
            $('#selectProducto').select2({
                placeholder: "Seleccione un producto",
                allowClear: true
            });

            $('#selectPlazo').select2({
                placeholder: "Seleccione un plazo",
                allowClear: true
            });

            // Calcula los abonos cuando se selecciona un producto o un plazo
            $('#selectProducto, #selectPlazo').on('change', function() {
                calcularAbonos();
            });
        });

        function calcularAbonos() {
            // Obtener valores del producto seleccionado
            var productoSeleccionado = $('#selectProducto option:selected');
            var precioProducto = parseFloat(productoSeleccionado.data('precio'));

            // Obtener valores del plazo seleccionado
            var plazoSeleccionado = $('#selectPlazo option:selected');
            var tasaNormal = parseFloat(plazoSeleccionado.data('tasa-normal'));
            var tasaPuntual = parseFloat(plazoSeleccionado.data('tasa-puntual'));
            var duracionPlazo = parseInt(plazoSeleccionado.data('duracion'));

            if (!isNaN(precioProducto) && !isNaN(tasaNormal) && !isNaN(tasaPuntual) && !isNaN(duracionPlazo)) {
                // Calcular abonos
                var abonoNormal = ((precioProducto * tasaNormal) + precioProducto) / duracionPlazo;
                var abonoPuntual = ((precioProducto * tasaPuntual) + precioProducto) / duracionPlazo;

                // Mostrar resultados en los campos correspondientes
                $('#abonoNormal').val(abonoNormal.toFixed(2));
                $('#abonoPuntual').val(abonoPuntual.toFixed(2));
            } else {
                // Limpiar campos si no hay selección válida
                $('#abonoNormal').val('');
                $('#abonoPuntual').val('');
            }
        }
    </script>
@stop
