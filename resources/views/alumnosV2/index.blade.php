@extends('plantillas/plantilla1')


@section('contenido1')
    <h1>Alumnos</h1>
    @include('alumnosV2/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
