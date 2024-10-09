<?php

use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\PlazosController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para la gestión de Productos
Route::controller(ProductosController::class)->group(function () {

    // Ruta para mostrar todos los productos
    Route::get('productos/listar', 'listarRegistros')->name('productos.listar');

    // Ruta para mostrar un producto específico
    Route::get('productos/{producto}/detalles', 'mostrarRegistro')->name('productos.ver');

    // Ruta para mostrar el formulario de agregar un nuevo producto
    Route::get('productos/agregar', 'agregarProducto')->name('productos.agregar');
    Route::post('productos', 'procesarAgregado')->name('productos.procesar');

    // Ruta para mostrar el formulario de actualización de un producto
    Route::get('productos/{producto}/actualizar', 'actualizarProducto')->name('productos.actualizar');
    Route::put('productos/{producto}', 'procesarActualizacionProducto')->name('productos.procesar');

    // Ruta para eliminar un producto
    Route::delete('productos/{producto}', 'eliminarProducto')->name('productos.eliminar');

});

// Rutas para la gestión de Plazos
Route::controller(PlazosController::class)->group(function () {

    // Ruta para mostrar todos los plazos
    Route::get('plazos/listar', 'listarRegistros')->name('plazos.listar');

    // Ruta para mostrar un plazo específico
    Route::get('plazos/{plazo}/detalles', 'mostrarRegistro')->name('plazos.ver');

    // Ruta para mostrar el formulario de registrar un nuevo plazo
    Route::get('plazos/registrar', 'registrarPlazo')->name('plazos.registrar');
    Route::post('plazos', 'procesarRegistroPlazo')->name('plazos.procesar');

    // Ruta para mostrar el formulario de actualización de un plazo
    Route::get('plazos/{plazo}/actualizar', 'actualizarPlazo')->name('plazos.actualizar');
    Route::put('plazos/{plazo}', 'procesarActualizacionPlazo')->name('plazos.procesar');

    // Ruta para eliminar un plazo
    Route::delete('plazos/{plazo}', 'eliminarPlazo')->name('plazos.eliminar');
});

// Rutas para la gestión de Cotizaciones
Route::controller(CotizacionesController::class)->group(function () {

    // Ruta para mostrar todas las cotizaciones
    Route::get('cotizaciones/listar', 'listarRegistros')->name('cotizaciones.listar');

    // Ruta para mostrar una cotización específica
    Route::get('cotizaciones/{cotizacion}/detalles', 'mostrarRegistro')->name('cotizaciones.ver');

    // Ruta para mostrar el formulario de registrar una nueva cotización
    Route::get('cotizaciones/registrar', 'registrarCotizacion')->name('cotizaciones.registrar');
    Route::post('cotizaciones', 'procesarRegistroCotizacion')->name('cotizaciones.procesar');

});
