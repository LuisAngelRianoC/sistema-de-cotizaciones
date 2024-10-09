@extends('adminlte::page')

@section('title', 'Inicio')

@section('content')
    <div class="container welcome-section">
        <h1>¡Bienvenido a nuestro Sistema de Cotización de Grupo Salinas!</h1>
        <p>Explora nuestros productos y cotiza de manera fácil y rápida.</p>
        <img src="{{ asset('/img/logoinicio.png') }}" alt="Grupo Salinas">
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/estilo_inicio.css">
@stop