@extends('adminlte::page')

@section('title', 'Registro')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('cotizaciones.procesarRegistroCotizacion') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label class="control-label">SKU</label>
                        <input required type="text" class="form-control" id="sku" name="sku"
                            placeholder="Clave del producto">

                        @error('sku')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
               
                    <div class="col-md-12 mb-3">
                        <label>Plazo</label>
                        <input required type="text" class="form-control" id="nombre_producto" name="nombre_producto"
                            placeholder="Nombre del producto">
                        @error('nombre_producto')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
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
