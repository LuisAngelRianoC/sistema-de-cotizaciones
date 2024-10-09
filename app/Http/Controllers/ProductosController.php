<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function listarRegistros(Request $request)
    {
        return view("productos.listar");

    }

    public function mostrarRegistro(Productos $producto)
    {
        return view("productos.ver", compact('producto'));

    }

    public function agregarProducto(Request $request)
    {
        return view("productos.agregar");
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
