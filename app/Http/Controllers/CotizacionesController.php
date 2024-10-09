<?php

namespace App\Http\Controllers;

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

    public function mostrarRegistro(Request $request, $cotizacion)
    {
        // Lógica para mostrar una cotización específica
    }

    public function registrarCotizacion(Request $request)
    {
        // Lógica para mostrar el formulario de registro de una nueva cotización
    }

    public function procesarRegistroCotizacion(Request $request)
    {
        // Lógica para procesar el registro de una nueva cotización
    }
}
