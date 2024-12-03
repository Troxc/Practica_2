@extends('plantillas/plantilla')

@section('contenido')
    <br>
    <div class="container">
        <h2 class="text-center mb-4">Asignación de Tutores</h2>
    </div>
    <form action="{{ route('tutores.index') }}" method="get">
        @csrf
        <div class="row mb-3 justify-content-center">
            <div class="col-md-2 ">
                <select name="depto" id="depto" class="form-select" onchange="this.form.submit()">
                    <option value="-1">Seleccione Depto</option>
                    @foreach ($deptos as $depto)
                        <option value="{{ $depto->id }}" @if ($depto->id == session('depto')) selected @endif>
                            {{ $depto->nombreDepto }}
                        </option>
                    @endforeach
                </select>
            </div>
            @if (session('depto') != -1)
                <div class="col-md-2  ">
                    <select name="personal_id" id="personal_id" class="form-select" onchange="this.form.submit()">
                        <option value="-1">Seleccione el Tutor</option>
                        @foreach ($personals as $persona)
                            <option value="{{ $persona->id }}" @if ($persona->id == session('personal_id')) selected @endif>
                                {{ $persona->nombres }} {{ $persona->apellidoP }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="col-md-3 ">
                <select name="periodo_id" id="periodo_id" class="form-select" onchange="this.form.submit()">
                    <option value="-1">Seleccione el periodo</option>
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}" @if ($periodo->id == session('periodo_id')) selected @endif>
                            {{ $periodo->periodo }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            @if (session('personal_id') && session('periodo_id') != -1)
            <div class="col text-center">
                <a class="btn btn-primary" href="{{ route('tutores.guardar') }}" role="button">Asignar Alumnos</a>
            </div>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <a class="btn btn-danger" href="{{ route('tutores.cancelar') }}" role="button">Cancelar</a>
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
