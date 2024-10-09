<a href="{{ route('plazos.ver', ['plazo' => $id_plazo]) }}" title="Ver Regitro" class="btn btn-primary btn-sm"><i
    class="far fa-eye"></i></a>
<a href="{{ route('plazos.actualizar', $id_plazo) }}" title="Actualizar Regitro" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
<form action="{{ route('plazos.eliminar', $id_plazo) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm" title="Eliminar Regitro"><i class="fas fa-trash"></i></button>
</form>
