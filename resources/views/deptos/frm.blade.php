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
            <form action="{{ route('deptos.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('deptos.update', $depto->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('deptos.destroy', $depto->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="idDepto" class="col-4 col-form-label">ID Depto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="idDepto" id="idDepto"
                    placeholder="ID de Depto" value="{{ @old('idDepto', $depto->idDepto) }}" />
                @error('idDepto')
                    <p style="color: red">Error en el ID: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreDepto" class="col-4 col-form-label">Nombre de Depto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreDepto" id="nombreDepto"
                    placeholder="Nombre de Depto" value="{{ @old('nombreDepto', $depto->nombreDepto) }}" />
                @error('nombreDepto')
                    <p style="color: red">Error en el Nombre: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreMediano" class="col-4 col-form-label">Nombre Mediano :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreMediano" id="nombreMediano"
                    placeholder="Nombre Mediano" value="{{ @old('nombreMediano', $depto->nombreMediano) }}" />
                @error('nombreMediano')
                    <p style="color: red">Error en el Nombre Mediano: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombreCorto" class="col-4 col-form-label">Nombre Corto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombreCorto" id="nombreCorto"
                    placeholder="Nombre Corto" value="{{ @old('nombreCorto', $depto->nombreCorto) }}" />
                @error('nombreCorto')
                    <p style="color: red">Error en el Nombre Corto: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8 d-flex">
                <button type="submit" class="btn {{ $color }} me-2">
                    {{ $btn }}
                </button>
                <a name="" id="" class="btn btn-primary" href="{{ route('deptos.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
