@extends('plantillas/plantilla1')


@section('contenido1')
    <div class="row mt-3">
        <div class="col-5">
            <h2>Lista de Alumnos del Tutor: </h2>
        </div>
        <div class="col">
            <h2>{{$tutor->personal->nombres}} {{$tutor->personal->apellidoP}} {{$tutor->personal->apellidoM}}</h2> 
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <h2>En El Periodo: </h2>
        </div>
        <div class="col">
            <h2>{{$tutor->periodos->periodo}}</h2> 
        </div>
    </div>
<br>
    @include('tutoresLista/tablahtml2')
@endsection

@section('contenido2')
    @include('catalogos/menuC')
@endsection
