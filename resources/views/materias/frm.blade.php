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
            <form action="{{ route('materias.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('materias.update', $materia->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="nombreMateria" class="col-4 col-form-label">Nombre de la Materia :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreMateria" id="nombreMateria"
                    placeholder="Nombre de la Materia" value="{{ @old('nombreMateria', $materia->nombreMateria ?? '') }}" />
                @error('nombreMateria')
                    <p style="color: red">Error en Nombre: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nivel" class="col-4 col-form-label">Nivel :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nivel" id="nivel"
                    placeholder="Nivel" value="{{ @old('nivel', $materia->nivel ?? '') }}" />
                @error('nivel')
                    <p style="color: red">Error en Nivel: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreMediano" class="col-4 col-form-label">Nombre Mediano :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreMediano" id="nombreMediano"
                    placeholder="Nombre Mediano" value="{{ @old('nombreMediano', $materia->nombreMediano ?? '') }}" />
                @error('nombreMediano')
                    <p style="color: red">Error en Nombre Mediano: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreCorto" class="col-4 col-form-label">Nombre Corto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreCorto" id="nombreCorto"
                    placeholder="Nombre Corto" value="{{ @old('nombreCorto', $materia->nombreCorto ?? '') }}" />
                @error('nombreCorto')
                    <p style="color: red">Error en Nombre Corto: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="modalidad" class="col-4 col-form-label">Modalidad :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="modalidad" id="modalidad"
                    placeholder="Modalidad" value="{{ @old('modalidad', $materia->modalidad ?? '') }}" />
                @error('modalidad')
                    <p style="color: red">Error en Modalidad: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="reticula_id" class="col-4 col-form-label">RETICULA :</label>
            <div class="col-8">
                <select {{ $des }} name="reticula_id" id="reticula_id" class="form-control">
                    @foreach ($reticulas as $reticula)
                        <option value="{{ $reticula->id }}" {{ isset($materia) && $materia->reticula_id == $reticula->id ? 'selected' : '' }}>
                            {{ $reticula->descripcion }}
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
                <a name="" id="" class="btn btn-primary" href="{{ route('materias.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
