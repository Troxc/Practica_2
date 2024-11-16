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
        <form action="{{ route('lugares.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
        <h1>Editando</h1>
        <form action="{{  route('lugares.update', $lugar->id)  }}" method="POST">
        @method("PUT")
        @endif

        @if ($accion == 'S')
        <h1>Eliminando</h1>
        <form action="{{  route('lugares.destroy', $lugar->id)  }}" method="POST">
        @method("DELETE")
        @endif

            @csrf
            <div class="mb-3 row">
                <label for="nombreLugar" class="col-4 col-form-label">Nombre Lugar :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="nombreLugar" id="nombreLugar" placeholder="Nombre del Lugar" value="{{@old('nombreLugar', $lugar->nombreLugar)}}" />
                    @error('nombreLugar')
                        <p style="color: red">Error en el Nombre del Lugar: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombreCorto" class="col-4 col-form-label">Nombre Corto :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="nombreCorto" id="nombreCorto" placeholder="Nombre Corto" value="{{@old('nombreCorto', $lugar->nombreCorto)}}" />
                    @error("nombreCorto")
                        <p style="color: red">Error en el nombnre corto: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="edificio_id" class="col-4 col-form-label">Edificio :</label>
                <div class="col-8">
                    <select {{ $des }} name="edificio_id" id="edificio_id" class="form-control">
                        @foreach ($edificios as $edificio)
                            <option value="{{ $edificio->id }}" {{ isset($lugar) && $lugar->edificio_id == $edificio->id ? 'selected' : '' }}>
                                {{ $edificio->nombreEdificio }}
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
                    <a name="" id="" class="btn btn-primary" href="{{ route('lugares.index') }}"
                        role="button">REGRESAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection
