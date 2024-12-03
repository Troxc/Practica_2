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
        <form action="{{ route('grupoHorario17126s.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
        <h1>Editando</h1>
        <form action="{{  route('grupoHorario17126s.update', $grupoHorario17126->id)  }}" method="POST">
        @method("PUT")
        @endif

        @if ($accion == 'S')
        <h1>Eliminando</h1>
        <form action="{{  route('grupoHorario17126s.destroy', $grupoHorario17126->id)  }}" method="POST">
        @method("DELETE")
        @endif

            @csrf
            <div class="mb-3 row">
                <label for="grupo17126_id" class="col-4 col-form-label">Grupo :</label>
                <div class="col-8">
                    <select {{ $des }} name="grupo17126_id" id="grupo17126_id" class="form-control">
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}" {{ isset($grupoHorario17126) && $grupoHorario17126->grupo17126_id == $grupo->id ? 'selected' : '' }}>
                                {{ $grupo->grupo }}
                            </option>
                        @endforeach
                    </select>                
                </div>
            </div>
            <div class="mb-3 row">
                <label for="lugar_id" class="col-4 col-form-label">Lugar :</label>
                <div class="col-8">
                    <select {{ $des }} name="lugar_id" id="lugar_id" class="form-control">
                        @foreach ($lugars as $lugar)
                            <option value="{{ $lugar->id }}" {{ isset($grupoHorario17126) && $grupoHorario17126->lugar_id == $lugar->id ? 'selected' : '' }}>
                                {{ $lugar->nombreLugar }}
                            </option>
                        @endforeach
                    </select>                
                </div>
            </div>
            <div class="mb-3 row">
                <label for="dia" class="col-4 col-form-label">Día :</label>
                <div class="col-8">
                    <select {{$des}} class="form-control" name="dia" id="dia">
                        <option value="">Seleccionar día</option>
                        <option value="Lunes" {{ isset($grupoHorario17126) && $grupoHorario17126->dia == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                        <option value="Martes" {{ isset($grupoHorario17126) && $grupoHorario17126->dia == 'Martes' ? 'selected' : '' }}>Martes</option>
                        <option value="Miércoles"{{isset($grupoHorario17126) && $grupoHorario17126->dia == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                        <option value="Jueves" {{ isset($grupoHorario17126) && $grupoHorario17126->dia == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                        <option value="Viernes" {{ isset($grupoHorario17126) && $grupoHorario17126->dia == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                    </select>
                    @error('dia')
                        <p style="color: red">Error en el Día: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="hora" class="col-4 col-form-label">Hora :</label>
                <div class="col-8">
                    <input {{$des}} type="time" class="form-control" name="hora" id="hora" placeholder="Hora :" value="{{@old('hora', $grupoHorario17126->hora)}}" />
                    @error('hora')
                        <p style="color: red">Error en la hora: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8 d-flex">
                    <button type="submit" class="btn {{ $color }} me-2">
                        {{ $btn }}
                    </button>
                    <a name="" id="" class="btn btn-primary" href="{{ route('grupoHorario17126s.index') }}"
                        role="button">REGRESAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection
