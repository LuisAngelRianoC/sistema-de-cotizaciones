@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label class="control-label">SKU</label>
                        <input type="text" class="form-control" name="sku" value="{{ $respuesta->sku }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre_producto"
                            value="{{ $respuesta->nombre_producto }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" name="descripcion_producto"
                            value="{{ $respuesta->descripcion_producto }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Precio</label>
                        <input type="text" class="form-control" name="precio"
                            value="{{ $respuesta->precio }}">
                    </div>


                    <div class="col-md-2 mb-3">
                        <label>Fecha registro</label>
                        <input type="text" class="form-control" name="fecha_creacion"
                            value="{{ $respuesta->fecha_creacion }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Fecha actualizacion</label>
                        <input type="text" class="form-control" name="fecha_modificacion"
                            value="{{ $respuesta->fecha_modificacion }}">
                    </div>
            </fieldset>

            <div class="form-group">
                <a href="{{ route('productos.listar') }}" class="btn btn-primary">Regresar</a>
            </div>

        </div>
    </div>


@stop
