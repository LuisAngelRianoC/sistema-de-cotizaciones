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
        $respuesta = DB::select('call buscar_producto_individual(?)', array($producto->sku))[0];
        return view("productos.ver", compact('respuesta'));
    }

    public function registrarProducto(Request $request)
    {
        return view("productos.agregar");
    }

    public function procesarAgregado(Request $request)
    {
        $request->validate([
            'sku' => ['required'],
            'nombre_producto' => ['required'],
            'descripcion_producto' => ['required'],
            'precio' => ['required'],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
        ]);

        DB::select('call crear_producto(?,?,?,?)', [
            $request->sku,
            $request->nombre_producto,
            $request->descripcion_producto,
            $request->precio
        ]);

        return redirect()->route('productos.listar');
    }

    public function actualizarProducto(Productos $producto)
    {
        return view("productos.actualizar", compact('producto'));
    }

    public function procesarActualizacionProducto(Request $request)
    {
        $request->validate([
            'sku' => ['required'],
            'nombre_producto' => ['required'],
            'descripcion_producto' => ['required'],
            'precio' => ['required'],
        ], [
            'required' => 'El campo :attribute es obligatorio.',
        ]);

        DB::select('call actualizar_producto(?,?,?,?)', [
            $request->sku,
            $request->nombre_producto,
            $request->descripcion_producto,
            $request->precio
        ]);

        return redirect()->route('productos.listar');
    }

    public function eliminarProducto(Productos $producto)
    {
        DB::select('call eliminar_producto(?)', array($producto->sku));
        return redirect()->route('productos.listar')->with('eliminar', 'ok');
    }

}
