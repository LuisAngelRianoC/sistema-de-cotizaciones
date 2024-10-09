<?php

namespace App\Http\Controllers;

use App\Models\Plazos;
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

    public function mostrarRegistro(Plazos $plazo)
    {
        $respuesta = DB::select('call buscar_plazo_individual(?)', array($plazo->id_plazo))[0];
        return view("plazos.ver", compact('respuesta'));
    }

    public function registrarPlazo(Request $request)
    {
        return view("plazos.registrar");
    }

    public function procesarRegistroPlazo(Request $request)
    {
        $request->validate([
            'duracion_semanas' => ['required'],
            'descripcion_plazo' => ['required'],
            'tasa_normal' => ['required'],
            'tasa_puntual' => ['required'],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
        ]);

        DB::select('call crear_plazo(?,?,?,?)', [
            $request->duracion_semanas,
            $request->descripcion_plazo,
            $request->tasa_normal,
            $request->tasa_puntual,
        ]);

        return redirect()->route('plazos.listar');
    }

    public function actualizarPlazo(Plazos $plazo)
    {
        return view("plazos.actualizar", compact('plazo'));
    }

    public function procesarActualizacionPlazo(Request $request, $plazo)
    {
        $request->validate([
            'id_plazo' => ['required'],
            'duracion_semanas' => ['required'],
            'descripcion_plazo' => ['required'],
            'tasa_normal' => ['required'],
            'tasa_puntual' => ['required'],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
        ]);

        DB::select('call actualizar_plazo(?,?,?,?,?)', [
            $request->id_plazo,
            $request->duracion_semanas,
            $request->descripcion_plazo,
            $request->tasa_normal,
            $request->tasa_puntual
        ]);

        return redirect()->route('plazos.listar');
    }

    public function eliminarPlazo(Plazos $plazo)
    {
        DB::select('call eliminar_plazo(?)', array($plazo->id_plazo));
        return redirect()->route('plazos.listar')->with('eliminar', 'ok');
    }
}
