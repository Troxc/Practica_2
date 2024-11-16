    <!--  @ dd($edificios) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->

    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>RFC</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha SEP</th>
                    <th>Fecha INS</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($personals as $persona)
                    <tr class="table-primary">
                        <td scope="row">{{ $persona->id }}</td>
                        <td>{{ $persona->RFC }}</td>
                        <td>{{ $persona->nombres }}</td>
                        <td>{{ $persona->apellidoP }}</td>
                        <td>{{ $persona->apellidoM }}</td>
                        <td>{{ $persona->fechaIngSep }}</td>
                        <td>{{ $persona->fechaIngIns }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('personals.edit', $persona->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('personals.show', $persona->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('personals.show', $persona->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('personals.create') }}">Nuevo</a>
        {{ $personals->links() }}
    </div>
    <hr>