<a href="{{ route('productos.ver', ['producto' => $sku]) }}" title="Ver Registro" class="btn btn-primary btn-sm"><i
        class="far fa-eye"></i></a>
<a href="{{ route('productos.actualizar',['producto' => $sku]) }}" title="Actualizar Registro" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
<form action="{{ route('productos.eliminar',['producto' => $sku]) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar Registro"><i class="fas fa-trash"></i></button>
</form>
