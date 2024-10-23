@extends('plantillas/plantilla1')


@section('contenido1')
    <h2>Puestos</h2>
    @include('puestos/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
