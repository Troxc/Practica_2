<!--  @ dd($materias) MOSTRAR TODOS LOS DATOS EN UNA COLECCIÓN -->
<hr>
<div class="table-responsive-sm">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
            <tr>
                <th>Nombre de la Materia</th>
                <th>Nivel</th>
                <th>Nombre Mediano</th>
                <th>Nombre Corto</th>
                <th>Modalidad</th>
                <th>Retícula</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">

            @foreach ($materias as $materia)
                <tr class="table-primary">
                    <td>{{ $materia->nombreMateria }}</td>
                    <td>{{ $materia->nivel }}</td>
                    <td>{{ $materia->nombreMediano }}</td>
                    <td>{{ $materia->nombreCorto }}</td>
                    <td>{{ $materia->modalidad }}</td>
                    <td>{{ $materia->reticula->descripcion ?? 'N/A' }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('materias.edit', $materia->id) }}">
                            Editar
                        </a>
                        <a class="btn btn-danger" href="{{ route('materias.show', $materia->id) }}">
                            Eliminar
                        </a>
                        <a class="btn btn-success" href="{{ route('materias.show', $materia->id) }}">
                            Ver
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tfoot>

        </tfoot>
    </table>
    <a class="btn btn-primary" href="{{ route('materias.create') }}">Nuevo</a>
    <select name="" id="">
        @foreach ($carreras as $carrera)
            <option value="">{{ $carrera->nombreCarrera}}</option>
        @endforeach
    </select>
    {{ $materias->links() }}
</div>
