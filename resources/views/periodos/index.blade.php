@extends('plantillas/plantilla1')


@section('contenido1')
    <h2>Periodos</h2>
    @include('periodos/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
