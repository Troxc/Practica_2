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
            <form action="{{ route('puestos.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('puestos.update', $puesto->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="idPuesto" class="col-4 col-form-label">Id Puesto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="idPuesto" id="idPuesto"
                    placeholder="Id Puesto" value="{{ @old('idPuesto', $puesto->idPuesto) }}" />
                @error('idPuesto')
                    <p style="color: red">Error en el Id de Puesto: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombre" class="col-4 col-form-label">Nombre del Puesto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombre" id="nombre"
                    placeholder="Nombre del Puesto" value="{{ @old('nombre', $puesto->nombre) }}" />
                @error('nombre')
                    <p style="color: red">Error en el nombre: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tipo" class="col-4 col-form-label">Tipo de Puesto :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="tipo" id="tipo"
                    placeholder="Tipo de Puesto" value="{{ @old('tipo', $puesto->tipo) }}" />
                @error('tipo')
                    <p style="color: red">Error en el Tipo de Puesto: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8 d-flex">
                <button type="submit" class="btn {{ $color }} me-2">
                    {{ $btn }}
                </button>
                <a name="" id="" class="btn btn-primary" href="{{ route('puestos.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
