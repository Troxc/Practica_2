    <!--  @ dd($grupos) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th>Descripcion</th>
                    <th>Num. Alumnos</th>
                    <th>Materia</th>
                    <th>Periodo</th>
                    <th>Personal</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($grupos as $grupo)
                    <tr class="table-primary">
                        <td scope="row">{{ $grupo->id }}</td>
                        <td>{{ $grupo->grupo }}</td>
                        <td>{{ $grupo->descripcion }}</td>
                        <td>{{ $grupo->maxAlumnos }}</td>
                        <td>{{ $grupo->materia->nombreMediano }}</td>
                        <td>{{ $grupo->periodo->periodo }}</td>
                        <td>{{ $grupo->personal->nombres }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('grupo17126s.edit', $grupo->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('grupo17126s.show', $grupo->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('grupo17126s.show', $grupo->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('grupo17126s.create') }}">Nuevo</a>
        {{ $grupos->links() }}
    </div>
    <hr>