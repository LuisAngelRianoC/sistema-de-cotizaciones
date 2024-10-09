@extends('adminlte::page')

@section('title', 'Plazo')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <fieldset disabled>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label class="control-label">ID</label>
                        <input type="text" class="form-control" name="sku" value="{{ $respuesta->id_plazo }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" name="descripcion_plazo"
                            value="{{ $respuesta->descripcion_plazo }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Duracion</label>
                        <input type="text" class="form-control" name="duracion_semanas"
                            value="{{ $respuesta->duracion_semanas }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Tasa normal</label>
                        <input type="text" class="form-control" name="tasa_normal"
                            value="{{ $respuesta->tasa_normal }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Tasa puntual</label>
                        <input type="text" class="form-control" name="tasa_puntual"
                            value="{{ $respuesta->tasa_puntual }}">
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
