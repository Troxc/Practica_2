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
        <form action="{{ route('personals.store') }}" method="POST">
        @endif

        @if ($accion == 'E')
        <h1>Editando</h1>
        <form action="{{  route('personals.update', $personal->id)  }}" method="POST">
        @method("PUT")
        @endif

        @if ($accion == 'S')
        <h1>Eliminando</h1>
        <form action="{{  route('personals.destroy', $personal->id)  }}" method="POST">
        @method("DELETE")
        @endif

            @csrf
            <div class="mb-3 row">
                <label for="RFC" class="col-4 col-form-label">RFC :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="RFC" id="RFC" placeholder="RFC" value="{{@old('RFC', $personal->RFC)}}" />
                    @error('RFC')
                        <p style="color: red">Error en el RFC: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombres" class="col-4 col-form-label">Nombres :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre(s)" value="{{@old('nombres', $personal->nombres)}}" />
                    @error("nombres")
                        <p style="color: red">Error en el Nombre: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apellidoP" class="col-4 col-form-label">Apellido Paterno :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="apellidoP" id="apellidoP" placeholder="Apellido Paterno" value="{{@old('apellidoP', $personal->apellidoP)}}" />
                    @error("apellidoP")
                        <p style="color: red">Error en el Apellido Paterno: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="apellidoM" class="col-4 col-form-label">Apellido Materno :</label>
                <div class="col-8">
                    <input {{$des}} type="text" class="form-control" name="apellidoM" id="apellidoM" placeholder="Apellido Materno" value="{{@old('apellidoM', $personal->apellidoM)}}" />
                    @error("apellidoM")
                        <p style="color: red">Error en el Apellido Materno: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fechaIngSep" class="col-4 col-form-label">Fecha Ing Sep :</label>
                <div class="col-8">
                    <input {{$des}} type="date" class="form-control" name="fechaIngSep" id="fechaIngSep" placeholder="Fecha Ing Ins" value="{{@old('fechaIngSep', $personal->fechaIngSep)}}" />
                    @error("fechaIngSep")
                        <p style="color: red">Error en Fecha SEP: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fechaIngIns" class="col-4 col-form-label">Fecha Ing Ins :</label>
                <div class="col-8">
                    <input {{$des}} type="date" class="form-control" name="fechaIngIns" id="fechaIngIns" placeholder="Fecha Ing Ins" value="{{@old('fechaIngIns', $personal->fechaIngIns)}}" />
                    @error("fechaIngIns")
                        <p style="color: red">Error en Fecha Ins: {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="depto_id" class="col-4 col-form-label">Departamento :</label>
                <div class="col-8">
                    <select {{ $des }} name="depto_id" id="depto_id" class="form-control">
                        @foreach ($deptos as $depto)
                            <option value="{{ $depto->id }}" {{ isset($personal) && $personal->depto_id == $depto->id ? 'selected' : '' }}>
                                {{ $depto->nombreDepto }}
                            </option>
                        @endforeach
                    </select>                
                </div>
            </div>
            <div class="mb-3 row">
                <label for="puesto_id" class="col-4 col-form-label">Puesto :</label>
                <div class="col-8">
                    <select {{ $des }} name="puesto_id" id="puesto_id" class="form-control">
                        @foreach ($puestos as $puesto)
                            <option value="{{ $puesto->id }}" {{ isset($personal) && $personal->puesto_id == $puesto->id ? 'selected' : '' }}>
                                {{ $puesto->nombre }}
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
                    <a name="" id="" class="btn btn-primary" href="{{ route('personals.index') }}"
                        role="button">REGRESAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection
