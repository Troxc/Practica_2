@extends('plantillas/plantilla1')


@section('contenido1')
    <h2>Personal</h2>
    @include('personals/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
