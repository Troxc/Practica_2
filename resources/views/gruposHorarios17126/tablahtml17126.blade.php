    <!--  @ dd($grupos) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Grupo</th>
                    <th>Lugar</th>
                    <th>Dia</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($grupoHorarios as $grupoHorario)
                    <tr class="table-primary">
                        <td scope="row">{{ $grupoHorario->id }}</td>
                        <td>{{ $grupoHorario->grupo17126?->grupo ?? 'Sin grupo asignado' }}</td>
                        <td>{{ $grupoHorario->lugar->nombreLugar }}</td>
                        <td>{{ $grupoHorario->dia }}</td>
                        <td>{{ $grupoHorario->hora }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('grupoHorario17126s.edit', $grupoHorario->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('grupoHorario17126s.show', $grupoHorario->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('grupoHorario17126s.show', $grupoHorario->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('grupoHorario17126s.create') }}">Nuevo</a>
        {{ $grupoHorarios->links() }}
    </div>
    <hr>