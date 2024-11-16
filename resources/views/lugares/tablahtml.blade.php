    <!--  @ dd($lugares) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre Lugar</th>
                    <th>Nombre Corto</th>
                    <th>EDIFICIO</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($lugars as $lugar)
                    <tr class="table-primary">
                        <td scope="row">{{ $lugar->id }}</td>
                        <td>{{ $lugar->nombreLugar }}</td>
                        <td>{{ $lugar->nombreCorto }}</td>
                        <td>{{ $lugar->edificio->nombreEdificio}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('lugares.edit', $lugar->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('lugares.show', $lugar->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('lugares.show', $lugar->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('lugares.create') }}">Nuevo</a>
        {{ $lugars->links() }}
    </div>
    <hr>