@extends('plantillas/plantilla1')


@section('contenido1')
    <h2>Puestos</h2>
    @include('puestos/tablahtml')
@endsection

@section('contenido2')
    <div class="list-group mt-3">
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Periodos</a>
        <a href="{{ route('plazas.index') }}"
            class="list-group-item list-group-item-primary list-group-item-action">Plazas</a>
        <a href="{{ route('puestos.index') }}"
            class="list-group-item list-group-item-primary list-group-item-action">Puestos</a>
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Personal</a>
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Deptos</a>
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Carreras</a>
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Reticulas</a>
        <a href="#" class="list-group-item list-group-item-primary list-group-item-action">Materias</a>
        <a href="{{ route('alumnos.index') }}"
            class="list-group-item list-group-item-primary list-group-item-action">Alumnos</a>
    </div>
@endsection
