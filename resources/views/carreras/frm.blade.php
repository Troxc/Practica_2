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
            <form action="{{ route('carreras.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('carreras.update', $carrera->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="idCarrera" class="col-4 col-form-label">ID Carrera :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="idCarrera" id="idCarrera"
                    placeholder="ID de Carrera" value="{{ @old('idCarrera', $carrera->idCarrera) }}" />
                @error('idCarrera')
                    <p style="color: red">Error en el ID: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreCarrera" class="col-4 col-form-label">Nombre de Carrera :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreCarrera" id="nombreCarrera"
                    placeholder="Nombre de Carrera" value="{{ @old('nombreCarrera', $carrera->nombreCarrera) }}" />
                @error('nombreCarrera')
                    <p style="color: red">Error en el Nombre: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreMediano" class="col-4 col-form-label">Nombre Mediano :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreMediano" id="nombreMediano"
                    placeholder="Nombre Mediano" value="{{ @old('nombreMediano', $carrera->nombreMediano) }}" />
                @error('nombreMediano')
                    <p style="color: red">Error en el Nombre Mediano: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreCorto" class="col-4 col-form-label">Nombre Corto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreCorto" id="nombreCorto"
                    placeholder="Nombre Corto" value="{{ @old('nombreCorto', $carrera->nombreCorto) }}" />
                @error('nombreCorto')
                    <p style="color: red">Error en el Nombre Corto: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="depto_id" class="col-4 col-form-label">DEPTO :</label>
            <div class="col-8">
                <select {{ $des }} name="depto_id" id="depto_id" class="form-control">
                    @foreach ($deptos as $depto)
                        <option value="{{ $depto->id }}" {{ isset($carrera) && $carrera->depto_id == $depto->id ? 'selected' : '' }}>
                            {{ $depto->nombreDepto }}
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
                <a name="" id="" class="btn btn-primary" href="{{ route('carreras.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
