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
            <form action="{{ route('reticulas.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('reticulas.update', $reticula->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('reticulas.destroy', $reticula->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="descripcion" class="col-4 col-form-label">Descripcion :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="descripcion" id="descripcion"
                    placeholder="Descripcion" value="{{ @old('descripcion', $reticula->descripcion) }}" />
                @error('descripcion')
                    <p style="color: red">Error en la Descripcion: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="fechaVigor" class="col-4 col-form-label">Fecha en Vigor :</label>
            <div class="col-8">
                <input {{ $des }} type="date" class="form-control" name="fechaVigor" id="fechaVigor"
                    placeholder="Fecha en Vigor" value="{{ @old('fechaVigor', $reticula->fechaVigor) }}" />
                @error('fechaVigor')
                    <p style="color: red">Error en Fecha: {{ $message }}</p>
                @enderror
            </div>
        </div>
        </div>
        <div class="mb-3 row">
            <label for="carrera_id" class="col-4 col-form-label">CARRERA :</label>
            <div class="col-8">
                <select {{ $des }} name="carrera_id" id="carrera_id" class="form-control">
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ isset($reticula) && $reticula->carrera_id == $carrera->id ? 'selected' : '' }}>
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
                <a name="" id="" class="btn btn-primary" href="{{ route('reticulas.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
