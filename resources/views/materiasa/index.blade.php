@extends('plantillas/plantilla')

@section('contenido')
    <div class="row align-items-center">
        <div class="col-md-6 d-flex align-items-center">

            <h3 class="mt-3">Apertura de Materias</h3>
        </div>
        <div class="col-md-6">
            {{-- Formulario de filtros --}}
            <form action="{{ route('materiasa.index') }}" method="get" class="text-end">
                <div class="mb-3 mt-3">
                    <label for="idperiodo" class="form-label">Periodo:</label>
                    <select name="idperiodo" id="idperiodo" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
                        <option value="-1">Seleccione el periodo</option>
                        @foreach ($periodos as $periodo)
                            <option value="{{ $periodo->id }}" @if ($periodo->id == session('periodo_id')) selected @endif>
                                {{ $periodo->id }} {{ $periodo->periodo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="idcarrera" class="form-label">Carrera:</label>
                    <select name="idcarrera" id="idcarrera" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
                        <option value="-1">Seleccione la carrera</option>
                        @foreach ($carreras as $carr)
                            <option value="{{ $carr->id }}" @if ($carr->id == session('carrera_id')) selected @endif>
                                {{ $carr->nombreCarrera }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <form action="{{ route('materiasa.store') }}" method="post">
                @csrf
                <input type="hidden" name="eliminar" id="eliminar" value="NOELIMINAR">

                @if ($carrera->count() and session('periodo_id') != '-1')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @for ($semestre = 1; $semestre <= 9; $semestre++)
                                    <th>Semestre {{ $semestre }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for ($semestre = 1; $semestre <= 9; $semestre++)
                                    <td>
                                        @foreach ($carrera[0]->reticulas[0]->materias as $materia)
                                            @if ($materia->semestre == $semestre)
                                                <input type="checkbox" name="m{{ $materia->id }}"
                                                    value="{{ $materia->id }}" onchange="enviar(this)"
                                                    @if ($ma->firstWhere('materia_id', $materia->id)) checked @endif>
                                                {{ $materia->nombreMediano }}<br>
                                            @endif
                                        @endforeach
                                    </td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>
                @endif
            </form>
        </div>
    </div>
    <script>
        function enviar(chbox) {
            if (!chbox.checked) {
                document.getElementById('eliminar').value = chbox.value;
            }
            chbox.form.submit();
        }
    </script>
@endsection
