@extends('plantillas/plantilla')

@section('contenido')
    <div class="container mt-3">

        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach

        @if ($accion == 'C')
            <h1>Insertando</h1>
            <form action="{{ route('grupo17126s.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('grupo17126s.update', $grupo17126->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('grupo17126s.destroy', $grupo17126->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="grupo" class="col-4 col-form-label">Grupo :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="grupo" id="grupo"
                    placeholder="Grupo :" value="{{ @old('grupo', $grupo17126->grupo) }}" />
                @error('grupo')
                    <p style="color: red">Error en el Grupo: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="descripcion" class="col-4 col-form-label">Descripcion :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="descripcion" id="descripcion"
                    placeholder="Descripcion :" value="{{ @old('descripcion', $grupo17126->descripcion) }}" />
                @error('descripcion')
                    <p style="color: red">Error en la Descripcion: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="maxAlumnos" class="col-4 col-form-label">Num Alumnos :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="maxAlumnos" id="maxAlumnos"
                    placeholder="Maximo de Alumnos :" value="{{ @old('maxAlumnos', $grupo17126->maxAlumnos) }}" />
                @error('maxAlumnos')
                    <p style="color: red">Error en el maxAlumnos: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="materia_id" class="col-4 col-form-label">Materia :</label>
            <div class="col-8">
                <select {{ $des }} name="materia_id" id="materia_id" class="form-control">
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}"
                            {{ isset($grupo17126) && $grupo17126->materia_id == $materia->id ? 'selected' : '' }}>
                            {{ $materia->nombreMateria }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="periodo_id" class="col-4 col-form-label">Periodo :</label>
            <div class="col-8">
                <select {{ $des }} name="periodo_id" id="periodo_id" class="form-control">
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}"
                            {{ isset($grupo17126) && $grupo17126->periodo_id == $periodo->id ? 'selected' : '' }}>
                            {{ $periodo->periodo }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="personal_id" class="col-4 col-form-label">Personal :</label>
            <div class="col-8">
                <select {{ $des }} name="personal_id" id="personal_id" class="form-control">
                    @foreach ($personals as $personal)
                        <option value="{{ $personal->id }}"
                            {{ isset($grupo17126) && $grupo17126->personal_id == $personal->id ? 'selected' : '' }}>
                            {{ $personal->nombres }} {{ $personal->apellidoP }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8 d-flex">
                <button type="submit" class="btn {{ $color }} me-2">
                    {{ $btn }}
                </button>
                <a name="" id="" class="btn btn-primary" href="{{ route('grupo17126s.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
    @if ($accion == 'E')
        <div class="container mt-3">

            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach


            <h1>Insertando en Grupos Horarios</h1>
            <form action="{{ route('grupoHorario17126s.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="grupo17126_id" class="col-4 col-form-label">Grupo :</label>
                    <div class="col-8">
                        <select {{ $des }} name="grupo17126_id" id="grupo17126_id" class="form-control">
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id }}" {{ $grupo17126->id == $grupo->id ? 'selected' : '' }}>
                                    {{ $grupo->grupo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="mb-3 row">
                        <label for="lugar_id" class="col-4 col-form-label">Lugar :</label>
                        <div class="col-8">
                            <select {{ $des }} name="lugar_id" id="lugar_id" class="form-control">
                                @foreach ($lugars as $lugar)
                                    <option value="{{ $lugar->id }}">
                                        {{ $lugar->nombreLugar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dia" class="col-4 col-form-label">Dia :</label>
                        <div class="col-8">
                            <select class="form-control" name="dia" id="dia">
                                <option value="">Seleccionar día</option>
                                <option selected value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                            </select>
                            @error('dia')
                                <p style="color: red">Error en el Día: {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="hora" class="col-4 col-form-label">Hora :</label>
                        <div class="col-8">
                            <input type="time" class="form-control" name="hora" id="hora"
                                value="07:00" placeholder="Hora :" />
                            @error('hora')
                                <p style="color: red">Error en la hora: {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                <div class="mb-3 row">
                    <div class="offset-sm-4 col-sm-8 d-flex">
                        <button type="submit" class="btn btn-success me-2">
                            INSERTAR
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
