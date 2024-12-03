
    <form method="GET" action="{{ route('vertutores.index') }}" class="mb-3">
        <div class="row align-items-center">
            <div class="col-auto">
                <label for="periodo" class="form-label fw-bold">Filtrar por Periodo:</label>
            </div>
            <div class="col-auto">
                <select name="periodo" id="periodo" class="form-select" onchange="this.form.submit()">
                    <option value="">Todos los periodos</option>
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}" 
                            {{ $selectedPeriodo == $periodo->id ? 'selected' : '' }}>
                            {{ $periodo->periodo }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nombre Completo</th>
                    <th>Archivo</th>
                    <th>Periodo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($tutores as $tutor)
                    <tr class="table-primary">
                        <td>{{ $tutor->personal->nombres }} {{ $tutor->personal->apellidoP }} {{ $tutor->personal->apellidoM }}</td>
                        <td>
                            @if ($tutor->formatoP)
                                <a href="{{ route('tutores.showFile', $tutor->id) }}" target="_blank" class="badge bg-success">Ver Archivo PDF</a>
                            @else
                                <span class="badge bg-danger">No hay Archivo</span>
                            @endif
                        </td>
                        <td>{{ $tutor->periodos->periodo }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('verturores.verAlumnado', $tutor->id) }}">Ver Alumnado</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tutores->links() }}
    </div>

