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
            <form action="{{ route('alumnos.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="noctrl" class="col-4 col-form-label">Numero Control :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="noctrl" id="noctrl"
                    placeholder="Numero de Control" value="{{ @old('noctrl', $alumno->noctrl) }}" />
                @error('noctrl')
                    <p style="color: red">Error en el Numero de Control: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombre" class="col-4 col-form-label">Nombre :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombre" id="nombre"
                    placeholder="Nombre del Alumno" value="{{ @old('nombre', $alumno->nombre) }}" />
                @error('nombre')
                    <p style="color: red">Error en el nombre: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="apellidoP" class="col-4 col-form-label">Apellido Paterno :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="apellidoP" id="apellidoP"
                    placeholder="Apellido Paterno" value="{{ @old('apellidoP', $alumno->apellidoP) }}" />
                @error('apellidoP')
                    <p style="color: red">Error en el apellido: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="apellidoM" class="col-4 col-form-label">Apellido Materno :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="apellidoM" id="apellidoM"
                    placeholder="Apellido Materno" value="{{ @old('apellidoM', $alumno->apellidoM) }}" />
                @error('apellidoM')
                    <p style="color: red">Error en el apellido: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="sexo" class="col-4 col-form-label">Sexo :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="sexo" id="sexo"
                    placeholder="Sexo" value="{{ @old('sexo', $alumno->sexo) }}" />
                @error('sexo')
                    <p style="color: red">Error en el seco: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="carrera_id" class="col-4 col-form-label">CARTRE :</label>
            <div class="col-8">
                <select {{ $des }} name="carrera_id" id="carrera_id" class="form-control">
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ isset($alumno) && $alumno->carrera_id == $carrera->id ? 'selected' : '' }}>
                            {{ $carrera->nombreCarrera }}
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
                <a name="" id="" class="btn btn-primary" href="{{ route('alumnos.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
