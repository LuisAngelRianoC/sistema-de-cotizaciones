@extends('adminlte::page')

@section('title', 'Actualizar Producto')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('productos.procesarActualizacionProducto', $producto) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label class="control-label">SKU</label>
                        <input required type="text" class="form-control" id="sku" disabled
                            value="{{ $producto->sku }}">

                        <input required type="text" style="display: none" name="sku"
                            value="{{ $producto->sku }}">

                        @error('sku')
                            <br>
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Nombre</label>
                            <input required type="text" class="form-control" id="nombre_producto" name="nombre_producto"
                                placeholder="Nombre del producto" value="{{ $producto->nombre_producto }}">
                            @error('nombre_producto')
                                <br>
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Descripción</label>
                            <input required type="text" class="form-control" id="descripcion_producto"
                                name="descripcion_producto" placeholder="Descripción del producto"
                                value="{{ $producto->descripcion_producto }}">
                            @error('descripcion_producto')
                                <br>
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Precio</label>
                            <input required type="number" class="form-control" id="precio" name="precio"
                                value="{{ $producto->precio }}" placeholder="Precio del producto">

                            @error('precio')
                                <br>
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('productos.listar') }}" class="btn btn-danger">Regresar</a>
                        <button type="submit" class="btn btn-primary mr-3">Grabar</button>
                    </div>
            </form>
        </div>
    </div>

@stop
