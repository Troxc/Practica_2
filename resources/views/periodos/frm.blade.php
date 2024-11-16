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
            <form action="{{ route('periodos.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('periodos.update', $periodo->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('periodos.destroy', $periodo->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="periodo" class="col-4 col-form-label">Periodo :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="periodo" id="periodo"
                    placeholder="Periodo" value="{{ @old('periodo', $periodo->periodo) }}" />
                @error('periodo')
                    <p style="color: red">Error en Periodo: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="descCorta" class="col-4 col-form-label">Descrp Corta :</label>
            <div class="col-8">
                <input {{ $des }} type="text" class="form-control" name="descCorta" id="descCorta"
                    placeholder="Descrp Corta" value="{{ @old('descCorta', $periodo->descCorta) }}" />
                @error('descCorta')
                    <p style="color: red">Error en Descrp: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="fechaIni" class="col-4 col-form-label">Fecha INI :</label>
            <div class="col-8">
                <input {{ $des }} type="date" class="form-control" name="fechaIni" id="fechaIni"
                    placeholder="Fecha INICIO" value="{{ @old('fechaIni', $periodo->fechaIni) }}" />
                @error('fechaIni')
                    <p style="color: red">Error en Fecha INI: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="fechaFin" class="col-4 col-form-label">Fecha FIN :</label>
            <div class="col-8">
                <input {{ $des }} type="date" class="form-control" name="fechaFin" id="fechaFin"
                    placeholder="Fecha FIN" value="{{ @old('fechaFin', $periodo->fechaFin) }}" />
                @error('fechaFin')
                    <p style="color: red">Error en Fecha INI: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8 d-flex">
                <button type="submit" class="btn {{ $color }} me-2">
                    {{ $btn }}
                </button>
                <a name="" id="" class="btn btn-primary" href="{{ route('periodos.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
