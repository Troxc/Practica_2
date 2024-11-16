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
        <form action="{{ route('personalPlazas.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
        <h1>Editando</h1>
        <form action="{{  route('personalPlazas.update', $personalPlaza->id)  }}" method="POST">
        @method("PUT")
        @endif

        @if ($accion == 'S')
        <h1>Eliminando</h1>
        <form action="{{  route('personalPlazas.destroy', $personalPlaza->id)  }}" method="POST">
        @method("DELETE")
        @endif

            @csrf
            <div class="mb-3 row">
                <label for="tipoNombramiento" class="col-4 col-form-label">Tipo Nombramiento :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="tipoNombramiento" id="tipoNombramiento" placeholder="Tipo de Nombramiento" value="{{@old('tipoNombramiento', $personalPlaza->tipoNombramiento)}}" />
                    @error('tipoNombramiento')
                        <p style="color: red">Error en el Tipo Nombramioento: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="plaza_id" class="col-4 col-form-label">Plaza :</label>
                <div class="col-8">
                    <select {{ $des }} name="plaza_id" id="plaza_id" class="form-control">
                        @foreach ($plazas as $plaza)
                            <option value="{{ $plaza->id }}" {{ isset($personalPlaza) && $personalPlaza->plaza_id == $plaza->id ? 'selected' : '' }}>
                                {{ $plaza->nombrePlaza }}
                            </option>
                        @endforeach
                    </select>                
                </div>
            </div>
            <div class="mb-3 row">
                <label for="personal_id" class="col-4 col-form-label">Personal :</label>
                <div class="col-8">
                    <select {{ $des }} name="personal_id" id="personal_id" class="form-control">
                        @foreach ($personals as $persona)
                            <option value="{{ $persona->id }}" {{ isset($personalPlaza) && $personalPlaza->personal_id == $persona->id ? 'selected' : '' }}>
                                {{ $persona->nombres }}
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
                    <a name="" id="" class="btn btn-primary" href="{{ route('personalPlazas.index') }}"
                        role="button">REGRESAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection
