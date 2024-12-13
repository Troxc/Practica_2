@extends('plantillas/plantilla')

@section('contenido')
    <br>
    <div class="container">
        <h2 class="text-center mb-4">Asignación de Grupos</h2>
        @csrf
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control form-control-sm" disabled name="InFecha"
                    value="{{ session('InFecha') }}">
            </div>
            <div class="col-md-2">
                <label for="grupo" class="form-label">Grupo:</label>
                <input type="text" class="form-control" disabled name="InNombre" value="{{ session('InNombre') }}">
            </div>
            <div class="col-md-2">
                <label for="maxAlu" class="form-label">Max. Alu:</label>
                <input type="number" class="form-control" disabled name="InMaxA" value="{{ session('InMaxA') }}">
            </div>
            <div class="col-md-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" disabled name="InDes" value="{{ session('InDes') }}">
            </div>
            <div class="col-md-3">
                <label for="periodo" class="form-label">Periodo:</label>
                <select name="idperiodo" id="idperiodo" disabled class="form-select">
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
                <select name="idcarrera" id="idcarrera" disabled class="form-select">
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
                <a name="" id="" class="btn btn-danger" href="{{ route('grupoHorarios.vaciarS') }}"
                    role="button">Finalizar Horario</a>

            </div>
        </div>
        <hr><br>
        {{-- SELECT DE SEMESTRE-MATERIAS --}}
        <div class="row">
            <div class="col-md-2">
                <form method="GET" action="{{ route('grupoHorarios.index') }}">
                    <select id="semestre" name="semestre" class="form-select mb-2" onchange="this.form.submit()">
                        <option value="-1">Seleccione Semestre</option>
                        @for ($i = 1; $i <= 9; $i++)
                            <option value="{{ $i }}" {{ session('semestrePruebas') == $i ? 'selected' : '' }}>
                                Semestre
                                {{ $i }}</option>
                        @endfor
                    </select>
                </form>
                <form id="materia-form" action="{{ route('grupoHorarios.store') }}" method="POST">
                    @csrf
                    <div class="list-group">
                        @foreach ($materias as $materia)
                            @if ($materia->semestre == session('semestrePruebas'))
                                <label class="list-group-item">
                                    <input class="form-check-input me-2" type="radio" name="materia"
                                        value="{{ $materia->id }}"
                                        onchange="document.getElementById('materia-form').submit()"
                                        @if ($gp->firstWhere('materia_id', $materia->id)) checked @endif>
                                    {{ $materia->nombreMateria }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
            {{-- SELECT DE DEPARTAMENTOS-PERSONAL --}}
            <div class="col-md-3">
                <form method="GET" action="{{ route('grupoHorarios.index') }}">
                    <select id="depto" name="depto" class="form-select mb-2" onchange="this.form.submit()">
                        <option value="-1">Seleccione Departamento</option>
                        @foreach ($deptos as $depto)
                            <option value="{{ $depto->id }}"
                                {{ session('deptoPruebas') == $depto->id ? 'selected' : '' }}>{{ $depto->nombreDepto }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <form id="profe-form" action="{{ route('grupoHorarios.store') }}" method="POST">
                    @csrf
                    <div class="list-group">
                        @foreach ($personal as $persona)
                            @if ($persona->depto_id == session('deptoPruebas'))
                                <label class="list-group-item">
                                    <input class="form-check-input me-2" type="radio" name="persona"
                                        value="{{ $persona->id }}"
                                        onchange="document.getElementById('profe-form').submit()"
                                        @if ($gp->firstWhere('personal_id', $persona->id)) checked @endif>
                                    {{ $persona->nombres }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </form>
            </div>
            {{-- SELECT DE EDIFICIOS --}}
            <div class="col-md-3">
                <form method="GET" id="edificio-form" action="{{ route('grupoHorarios.index') }}">
                    <select id="edificio" name="edificio" class="form-select mb-2" onchange="document.getElementById('edificio-form').submit()">
                        <option value="-1">Seleccione un Edificio</option>
                        @foreach ($edificios as $edificio)
                            <option value="{{ $edificio->id }}"
                                {{ session('edificioPruebas') == $edificio->id ? 'selected' : '' }}>{{ $edificio->nombreEdificio }}
                            </option>
                        @endforeach
                    </select>
                </form>
                <form id="lugar-form" action="{{ route('grupoHorarios.apoyo') }}" method="POST">
                    @csrf
                    <div class="list-group">
                        @foreach ($lugares as $lugar)
                            @if ($lugar->edificio_id == session('edificioPruebas'))
                                <label class="list-group-item">
                                    <input class="form-check-input me-2" type="radio" name="lugar"
                                        value="{{ $lugar->id }}"
                                        
                                        @if ($gH->firstWhere('lugar_id', $lugar->id)) checked @endif>
                                    {{ $lugar->nombreLugar }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Horario</h5>
                    <table class="table table-bordered text-center">
                        <table>
                            <thead>
                                <tr>
                                    <th>L</th>
                                    <th>M</th>
                                    <th>Mi</th>
                                    <th>J</th>
                                    <th>V</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($hour = 7; $hour <= 10; $hour++) 
                                    <tr>
                                        @for ($day = 1; $day < 6; $day++)
                                            <td>
                                                @if ($day === 1)
                                                    {{ $hour }}
                                                @endif
                                                @php
                                                    // Formatear la hora en el mismo formato que en la base de datos (H:i:s)
                                                    $formattedHour = \Carbon\Carbon::createFromTime($hour, 0, 0)->format('H:i:s');
                                                    
                                                    // Comprobar si el checkbox debe estar marcado
                                                    $isChecked = $paraselect->contains(function ($item) use ($day, $formattedHour) {
                                                        return $item->dia == $day && $item->hora == $formattedHour;
                                                    });
                                                @endphp
                                                {{-- @dd($paraselect) --}}
                                                <input type="checkbox" 
                                                       value="{{ $day }}{{ $hour }}" 
                                                       onclick="setLastChecked(this)" 
                                                       {{ $isChecked ? 'checked' : '' }}>
                                            </td>
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        
                </div>
                <input type="hidden" name="last_selected" id="last_selected">
                </form>
            
            
        </div> <br>



    </div>
@endsection
