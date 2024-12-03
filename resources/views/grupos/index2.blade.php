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
                <a name="" id="" class="btn btn-danger" href="{{ route('grupos.index') }}"
                    role="button">Finalizar Horario</a>

            </div>
        </div>
        <hr><br>
        <div class="row">
{{--             <div class="col-md-2">
                 <form method="GET" action="{{ route('grupoHorarios.index') }}"> 
                    <select id="semestre" name="semestre" class="form-select mb-2" onchange="this.form.submit()">
                        <option value="-1">Seleccione Semestre</option>
                        @for ($i = 1; $i <= 9; $i++)
                            <option value="{{ $i }}" {{ request('semestre') == $i ? 'selected' : '' }}>
                                Semestre
                                {{ $i }}</option>
                        @endfor
                    </select>
                 </form> 
                  <form id="materia-form" action="{{ route('grupoHorarios.store') }}" method="POST"> 
                    @csrf 
                    <div class="list-group">
                        @foreach ($materias as $materia)
                            @if ($materia->semestre == request('semestre'))
                                <label class="list-group-item">
                                    <input class="form-check-input me-2" type="radio" name="materia" value="{{ $materia->id }}"
                                    onchange="document.getElementById('materia-form').submit()" @if ($gp->firstWhere('materia_id', $materia->id)) checked @endif>
                                    {{ $materia->nombreMateria }}
                                </label>
                            @endif
                        @endforeach
                    </div>
                  </form>  
                @foreach ($prueba1M as $item)
                    @if ($item->grupo == session("InNombre"))
                        {{ $item->grupo}} y {{$item->materia_id}}
                    @endif
                @endforeach
            </div> --}}
             <div class="col-md-3">
                <form method="GET" action="{{ route('grupoHorarios.index') }}">
                    <select id="depto" name="depto" class="form-select mb-2" onchange="this.form.submit()">
                        <option value="-1">Seleccione Departamento</option>
                        @foreach ($deptos as $depto)
                            <option value="{{$depto->id}}" {{ request('depto') == $depto->id ? 'selected' : '' }} >{{$depto->nombreDepto}}</option>
                        @endforeach
                    </select>
                </form>
                <form id="profe-form" action="{{ route('grupoHorarios.store') }}" method="POST"> 
                    @csrf
                <div class="list-group">
                    @foreach ($personal as $persona)
                    @if ($persona->depto_id == request('depto'))
                        <label class="list-group-item">
                            <input class="form-check-input me-2" type="radio" name="persona" value="{{ $persona->id }}"
                            onchange="document.getElementById('profe-form').submit()"  @if ($gp->firstWhere('personal_id', $persona->id)) checked @endif>
                            {{ $persona->nombres }}
                        </label>
                    @endif
                @endforeach
                </div>
            </form> 
            </div>

            <div class="col-md-3">
                <select class="form-select mb-2">
                    <option>Edificio K</option>
                    <option>Edificio D</option>
                </select>
                <div class="list-group">
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="edificio"> Salón K1
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="edificio"> Salón K2
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-2" type="radio" name="edificio"> Salón K3
                    </label>
                </div>
            </div>

            <div class="col-md-4">
                <h5>Horario</h5>
                <table class="table table-bordered text-center">
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
                        <tr>
                            <td>7<input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>8<input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div> <br>



    </div>
@endsection
