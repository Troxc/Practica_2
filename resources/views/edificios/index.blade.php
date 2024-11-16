@extends('plantillas/plantilla1')


@section('contenido1')
    <h1>Edificios</h1>
    @include('edificios/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
