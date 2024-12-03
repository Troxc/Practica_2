@extends('plantillas/plantilla')

@section('contenido')
    <div class="container mt-3">

        @if ($accion == 'C')
            <h1>Periodos de Seguimientos</h1>
            <form action="{{ route('seguimientos.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
            <h1>Editando</h1>
            <form action="{{ route('seguimientos.update', $seguimiento->id) }}" method="POST">
                @method('PUT')
        @endif

        @if ($accion == 'S')
            <h1>Eliminando</h1>
            <form action="{{ route('seguimientos.destroy', $seguimiento->id) }}" method="POST">
                @method('DELETE')
        @endif

        @csrf

        <div class="mb-3 row">
            <label for="desc" class="col-4 col-form-label">Descripción:</label>
            <div class="col-8">
                <select {{ $des }} class="form-control" name="desc" id="desc">
                    <option value="">Seleccione una opción</option>
                    <option value="Primer Seguimiento" {{ isset($seguimiento) && $seguimiento->desc == 'Primer Seguimiento' ? 'selected' : '' }}>Primer Seguimiento</option>
                    <option value="Segundo Seguimiento" {{ isset($seguimiento) && $seguimiento->desc == 'Segundo Seguimiento' ? 'selected' : '' }}>Segundo Seguimiento</option>
                    <option value="Tercer Seguimiento" {{ isset($seguimiento) && $seguimiento->desc == 'Tercer Seguimiento' ? 'selected' : '' }}>Tercer Seguimiento</option>
                    <option value="Cuarto Seguimiento" {{ isset($seguimiento) && $seguimiento->desc == 'Cuarto Seguimiento' ? 'selected' : '' }}>Cuarto Seguimiento</option>
                </select>
                @error('desc')
                    <p style="color: red">Error en la descripción: {{ $message }}</p>
                @enderror
            </div>
        </div>
        
        
        <div class="mb-3 row">
            <label for="fechaIni" class="col-4 col-form-label">Fecha INI :</label>
            <div class="col-8">
                <input {{ $des }} type="date" class="form-control" name="fechaIni" id="fechaIni"
                    placeholder="Fecha INICIO" value="{{ @old('fechaIni', $seguimiento->fechaIni) }}" />
                @error('fechaIni')
                    <p style="color: red">Error en Fecha INI: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="fechaFin" class="col-4 col-form-label">Fecha FIN :</label>
            <div class="col-8">
                <input {{ $des }} type="date" class="form-control" name="fechaFin" id="fechaFin"
                    placeholder="Fecha FIN" value="{{ @old('fechaFin', $seguimiento->fechaFin) }}" />
                @error('fechaFin')
                    <p style="color: red">Error en Fecha INI: {{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="periodo_id" class="col-4 col-form-label">Periodo :</label>
            <div class="col-8">
                <select {{ $des }} name="periodo_id" id="periodo_id" class="form-control">
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}" {{ isset($seguimiento) && $seguimiento->periodo_id == $periodo->id ? 'selected' : '' }}>
                            {{ $periodo->periodo }}
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
                <a name="" id="" class="btn btn-primary" href="{{ route('seguimientos.index') }}"
                    role="button">REGRESAR</a>
            </div>
        </div>
        </form>
    </div>
@endsection
