    <!--  @ dd($edificios) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->

    
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre Edificio</th>
                    <th>Nombre Corto</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($edificios as $edificio)
                    <tr class="table-primary">
                        <td scope="row">{{ $edificio->id }}</td>
                        <td>{{ $edificio->nombreEdificio }}</td>
                        <td>{{ $edificio->nombreCorto }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('edificios.edit', $edificio->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('edificios.show', $edificio->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('edificios.show', $edificio->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('edificios.create') }}">Nuevo</a>
        {{ $edificios->links() }}
    </div>
    <hr>