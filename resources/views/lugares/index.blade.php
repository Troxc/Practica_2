@extends('plantillas/plantilla1')


@section('contenido1')
    <h1>Lugares</h1>
    @include('lugares/tablahtml')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
