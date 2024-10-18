    <!--  @ dd($plazas) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id Plaza</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($plazas as $plaza)
                    <tr class="table-primary">
                        <td scope="row">{{ $plaza->idPlaza }}</td>
                        <td>{{ $plaza->nombrePlaza }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('plazas.edit', $plaza->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('plazas.show', $plaza->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('plazas.show', $plaza->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('plazas.create') }}">Nuevo</a>
        {{ $plazas->links() }}
    </div>
