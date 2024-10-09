<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlazosController extends Controller
{
    public function listarRegistros(Request $request)
    {
        if ($request->ajax()) {
            $respuesta = DB::select('call buscar_plazos');
    
            return DataTables()->collection($respuesta)
                ->addColumn('actions', 'plazos.dtButtons')
                ->rawColumns(['actions'])
                ->toJson();
        }
        return view("plazos.listar");
    }

    public function mostrarRegistro(Request $request, $plazo)
    {
        // Lógica para mostrar un plazo específico
    }

    public function registrarPlazo(Request $request)
    {
        // Lógica para mostrar el formulario de registro de un nuevo plazo
    }

    public function procesarRegistroPlazo(Request $request)
    {
        // Lógica para procesar el registro de un nuevo plazo
    }

    public function actualizarPlazo(Request $request, $plazo)
    {
        // Lógica para mostrar el formulario de actualización de un plazo específico
    }

    public function procesarActualizacionPlazo(Request $request, $plazo)
    {
        // Lógica para procesar la actualización de un plazo
    }

    public function eliminarPlazo(Request $request, $plazo)
    {
        // Lógica para eliminar un plazo específico
    }
}
