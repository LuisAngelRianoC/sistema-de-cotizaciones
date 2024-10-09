<?php

namespace App\Http\Controllers;

use App\Models\Cotizaciones;
use App\Models\Plazos;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotizacionesController extends Controller
{
    public function listarRegistros(Request $request)
    {
        if ($request->ajax()) {
            $respuesta = DB::select('call mostrar_cotizaciones');

            return DataTables()->collection($respuesta)
                ->addColumn('actions', 'cotizaciones.dbButtons')
                ->rawColumns(['actions'])
                ->toJson();
        }
        return view("cotizaciones.listar");
    }

    public function mostrarRegistro(Cotizaciones $cotizacion)
    {
        $respuesta = DB::select('call mostrar_cotizacion_individual(?)', array($cotizacion->id_cotizacion))[0];
        return view("cotizaciones.ver", compact('respuesta'));
    }

    public function registrarCotizacion()
    {
        $productos = Productos::all();
        $plazos = Plazos::all();
    
        // Pasar productos y plazos a la vista
        return view("cotizaciones.registrar", compact('productos', 'plazos'));
    }

    public function procesarRegistroCotizacion(Request $request)
    {
        $request->validate([
            'sku' => ['required'],
            'id_plazo' => ['required'],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
        ]);
    
        // Llamar al procedimiento almacenado y obtener el ID de la cotización creada
        $id_cotizacion = DB::select('call crear_cotizacion(?, ?)', [
            $request->sku,
            $request->id_plazo,
        ]); // Asegúrate de que este campo exista en el resultado del procedimiento
    
        // Redirigir a la vista de la cotización recién creada
        return redirect()->route('cotizaciones.listar');
    }
}
