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
            <form action="{{ route('plazas.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('plazas.update', $plaza->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('plazas.destroy', $plaza->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="idPlaza" class="col-4 col-form-label">Id Plaza :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="idPlaza" id="idPlaza"
                    placeholder="Id Plaza" value="{{ @old('idPlaza', $plaza->idPlaza) }}" />
                @error('idPlaza')
                    <p style="color: red">Error en el Id de Plaza: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nombrePlaza" class="col-4 col-form-label">Nombre de Plaza :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="nombrePlaza" id="nombrePlaza"
                    placeholder="Nombre de Plaza" value="{{ @old('nombrePlaza', $plaza->nombrePlaza) }}" />
                @error('nombrePlaza')
                    <p style="color: red">Error en el Nombre Plaza: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8 d-flex">
                <button type="submit" class="btn {{ $color }} me-2">
                    {{ $btn }}
                </button>
                <a name="" id="" class="btn btn-primary" href="{{ route('plazas.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
