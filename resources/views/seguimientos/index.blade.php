@extends('plantillas/plantilla1')


@section('contenido1')
    <h2>Periodos</h2>
    @include('seguimientos/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
