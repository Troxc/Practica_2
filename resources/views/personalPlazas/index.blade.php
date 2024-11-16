@extends('plantillas/plantilla1')


@section('contenido1')
    <h2>Plazas-Personal</h2>
    @include('personalPlazas/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
