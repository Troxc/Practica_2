@extends('plantillas/plantilla1')


@section('contenido1')
    <h1>Carreras</h1>
    @include('carreras/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
