@extends('plantillas.plantilla')

@section('contenido')

<div class="d-flex justify-content-center align-items-center p-5 text-center" style="height: 80vh;">
    <div>
        <h1>Bienvenido al Sistema de Gestión</h1>
        <h1>Tipo: ADMINISTRADOR</h1>
        <h1>🐱‍🚀</h1>
    </div>
</div>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@endsection
