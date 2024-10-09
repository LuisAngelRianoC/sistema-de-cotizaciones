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

                    <div class="col-md-12 mt-3 mb-3">
                        <h4 style="text-align: center">Información del producto</h4>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>SNK de producto</label>
                        <input type="text" class="form-control" name="p_sku"
                            value="{{ $respuesta->p_sku }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Nombre producto</label>
                        <input type="text" class="form-control" name="p_nombre"
                            value="{{ $respuesta->p_nombre }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Precio producto</label>
                        <input type="text" class="form-control" name="p_precio"
                            value="${{ $respuesta->p_precio }}">
                    </div>

                    <div class="col-md-12 mt-3 mb-3">
                        <h4 style="text-align: center">Información del plazo</h4>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Plazo Id</label>
                        <input type="text" class="form-control" name="pl_id" value="{{ $respuesta->pl_id }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Duración plazo</label>
                        <input type="text" class="form-control" name="pl_duracion" value="{{ $respuesta->pl_duracion }} semanas">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Tasa normal</label>
                        <input type="text" class="form-control" name="pl_tasaNormal" value="{{ $respuesta->pl_tasaNormal }} %">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Tasa puntual</label>
                        <input type="text" class="form-control" name="pl_tasaPuntual" value="{{ $respuesta->pl_tasaPuntual }} %">
                    </div>

                    <div class="col-md-12 mt-3 mb-3">
                        <h4 style="text-align: center">Información de la cotización</h4>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="control-label">ID</label>
                        <input type="text" class="form-control" name="id_cotizacion" value="{{ $respuesta->id_cotizacion }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Abono normal</label>
                        <input type="text" class="form-control" name="abono_normal"
                            value="${{ $respuesta->abono_normal }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label>Abono puntual</label>
                        <input type="text" class="form-control" name="abono_puntual"
                            value="${{ $respuesta->abono_puntual }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Fecha cotización</label>
                        <input type="text" class="form-control" name="fecha_cotizacion"
                            value="{{ $respuesta->fecha_cotizacion }}">
                    </div>
            </fieldset>

            <div class="form-group">
                <a href="{{ route('cotizaciones.listar') }}" class="btn btn-primary">Regresar</a>
                <button class="btn btn-secondary" onclick="window.print()">Imprimir</button>
            </div>

        </div>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/estilo_impresion.css">
@stop
