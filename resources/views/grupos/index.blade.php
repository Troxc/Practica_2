@extends('plantillas/plantilla')

@section('contenido')
    <br>
    <div class="container">
        <h2 class="text-center mb-4">Asignación de Grupos</h2>
          </div>
        <form action="{{ route('grupos.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control form-control-sm" name="InFecha"
                        value="{{ session('InFecha') }}">
                </div>
                <div class="col-md-2">
                    <label for="grupo" class="form-label">Grupo:</label>
                    <input type="text" class="form-control" name="InNombre" placeholder="{{ session('InNombre') }}">
                </div>
                <div class="col-md-2">
                    <label for="maxAlu" class="form-label">Max. Alu:</label>
                    <input type="number" class="form-control" name="InMaxA" value="{{ session('InMaxA') }}">
                </div>
                <div class="col-md-3">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <input type="text" class="form-control" name="InDes" placeholder="{{ session('InDes') }}">
                </div>
                <div class="col-md-3">
                    <label for="periodo" class="form-label">Periodo:</label>
                    <select name="idperiodo" id="idperiodo" class="form-select">
                        <option value="-1">Seleccione el periodo</option>
                        @foreach ($periodos as $periodo)
                            <option value="{{ $periodo->id }}" @if ($periodo->id == session('periodo_idG')) selected @endif>
                                {{ $periodo->id }} {{ $periodo->periodo }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 offset-md-9">
                    <label for="carrera" class="form-label">Carrera:</label>
                    <select name="idcarrera" id="idcarrera" class="form-select">
                        <option value="-1">Seleccione la carrera</option>
                        @foreach ($carreras as $carr)
                            <option value="{{ $carr->id }}" @if ($carr->id == session('carrera_idG')) selected @endif>
                                {{ $carr->nombreCarrera }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Iniciar Horario del Grupo</button>
                </div>
            </div>
        </form>
        <hr><br>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
@endsection
