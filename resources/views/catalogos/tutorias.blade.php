@extends('plantillas.plantilla')

@section('contenido')
    <div class="list-group list-group-horizontal d-flex p-3 mt-3">
        <a href="{{route('seguimientos.index')}}" class="list-group-item list-group-item-primary list-group-item-action text-center">Periodos de Seguimientos</a>
        <a href="{{route('tutores.index')}}" class="list-group-item list-group-item-primary list-group-item-action text-center">Asignar Asesores</a>
        <a href="{{route('vertutores.index')}}" class="list-group-item list-group-item-primary list-group-item-action text-center ">Ver Asesores</a>
    </div>
@endsection
