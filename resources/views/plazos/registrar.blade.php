@extends('adminlte::page')

@section('title', 'Registro')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('plazos.procesarRegistroPlazo') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Descripcion</label>
                        <input required type="text" class="form-control" id="descripcion_plazo" name="descripcion_plazo"
                            placeholder="Descripcion del plazo">
                        @error('descripcion_plazo')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-8 mb-3">
                        <label>Duracion de plazo</label>
                        <input required type="number" class="form-control" id="duracion_semanas" name="duracion_semanas"
                            placeholder="Duracion del plazo">
                        @error('duracion_semanas')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label>Tasa normal</label>
                        <input required type="number" step="any" class="form-control" id="tasa_normal" name="tasa_normal"
                            placeholder="Tasa normal">

                        @error('tasa_normal')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Tasa puntual</label>
                        <input required type="number" step="any" class="form-control" id="tasa_puntual" name="tasa_puntual"
                            placeholder="Tasa puntual">

                        @error('tasa_puntual')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>

                    
                </div>
                <div class="form-group">
                    <a href="{{ route('plazos.listar') }}" class="btn btn-danger">Regresar</a>
                    <button type="submit" class="btn btn-primary mr-3">Grabar</button>
                </div>
            </form>
        </div>
    </div>


@stop
