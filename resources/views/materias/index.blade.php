@extends('plantillas/plantilla1')


@section('contenido1')
    <h1>Materias</h1>
    @include('materias/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
