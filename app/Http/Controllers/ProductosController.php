<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function listarRegistros(Request $request)
    {
        if ($request->ajax()) {
            $respuesta = DB::select('call buscar_productos');
    
            return DataTables()->collection($respuesta)
                ->addColumn('actions', 'productos.dtButtons')
                ->rawColumns(['actions'])
                ->toJson();
        }
        return view("productos.listar");

    }

    public function mostrarRegistro(Productos $producto)
    {
        return view("productos.ver", compact('producto'));

    }

    public function registrarProducto(Request $request)
    {
        return view("productos.registrar");
    }

    public function procesarAgregado(Request $request)
    {
        
    }

    public function actualizarProducto(Productos $producto)
    {
        return view("productos.ver", compact('producto'));
    }

    public function procesarActualizacionProducto(Productos $producto)
    {


    }

    public function eliminarProducto(Productos $producto)
    {


    }
}
