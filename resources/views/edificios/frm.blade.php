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
        <form action="{{ route('edificios.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
        <h1>Editando</h1>
        <form action="{{  route('edificios.update', $edificio->id)  }}" method="POST">
        @method("PUT")
        @endif

        @if ($accion == 'S')
        <h1>Eliminando</h1>
        <form action="{{  route('edificios.destroy', $edificio->id)  }}" method="POST">
        @method("DELETE")
        @endif

            @csrf
            <div class="mb-3 row">
                <label for="nombreEdificio" class="col-4 col-form-label">Nombre Edificio :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="nombreEdificio" id="nombreEdificio" placeholder="Nombre del Edificio" value="{{@old('nombreEdificio', $edificio->nombreEdificio)}}" />
                    @error('nombreEdificio')
                        <p style="color: red">Error en el Nombre del Edificio: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombreCorto" class="col-4 col-form-label">Nombre Corto :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="nombreCorto" id="nombreCorto" placeholder="Nombre Corto" value="{{@old('nombreCorto', $edificio->nombreCorto)}}" />
                    @error("nombreCorto")
                        <p style="color: red">Error en el nombnre corto: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8 d-flex">
                    <button type="submit" class="btn {{ $color }} me-2">
                        {{ $btn }}
                    </button>
                    <a name="" id="" class="btn btn-primary" href="{{ route('edificios.index') }}"
                        role="button">REGRESAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection
