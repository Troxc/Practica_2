@extends('plantillas/plantilla1')


@section('contenido1')
    <h1>Reticulas</h1>
    @include('reticulas/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
