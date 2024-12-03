@extends('plantillas.plantilla')

@section('contenido')
    <H3 class="ms-3 mt-2">Sistema de Creacion de Horarios</H3>
    <div class="list-group list-group-horizontal d-flex p-3">
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Docentes</a>
        <a href="{{ route('materiasa.index')}}" class="list-group-item list-group-item-primary list-group-item-action">Materias Abiertas</a>
        <a href="{{ route('grupos.index')}}" class="list-group-item list-group-item-primary list-group-item-action">GRUPOS</a>
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Alumnos</a>
        <a href="{{ route('grupo17126s.index')}}" class="list-group-item list-group-item-primary list-group-item-action">Grupos 2</a>
        <a href="{{ route('grupoHorario17126s.index')}}" class="list-group-item list-group-item-primary list-group-item-action">Grupos Horarios 2</a>
    </div>
@endsection
