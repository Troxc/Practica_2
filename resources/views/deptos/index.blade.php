@extends('plantillas/plantilla1')


@section('contenido1')
    <h1>Deptos</h1>
    @include('deptos/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
