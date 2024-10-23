@extends('plantillas/plantilla1')


@section('contenido1')
    <h2>Plazas</h2>
    @include('plazas/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
