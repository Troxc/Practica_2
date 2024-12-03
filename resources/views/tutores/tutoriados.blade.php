@extends('plantillas.plantilla')

@section('contenido')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Listado de Alumnos</h2>
        <form action="{{ route('tutorados.store') }}" method="POST">
            <input type="hidden" name="eliminar" id="eliminar" value="NOELIMINAR">
            @csrf
            @if ($alumnos->count())
                <table class="table table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Número de Control</th>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->noctrl }}</td>
                                <td>{{ $alumno->nombre ?? 'N/A' }}</td>
                                <td>{{ $alumno->email ?? 'N/A' }}</td>
                                <td>
                                    <input type="checkbox" name="m{{ $alumno->id }}" value="{{ $alumno->id }}"
                                        onchange="enviar(this)" @if ($alumnoTutor->firstWhere('alumno_id', $alumno->id)) checked @endif>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info text-center">
                    No se encontraron alumnos disponibles.
                </div>
            @endif
        </form>
        <hr>
        <div class="row justify-content-center align-items-center">
            <div class="col-auto">
                <div class="text-center mt-2">
                    <a href="{{ route('tutorados.generarR') }}" class="btn btn-success">Imprimir Reporte</a>
                </div>
            </div>
            <div class="col-auto">
                <div class="text-center mt-2">
                    <a href="{{ route('vertutores.index') }}" class="btn btn-danger">Finalizar lista</a>
                </div>
            </div>
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
