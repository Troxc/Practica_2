    <!--  @ dd($personalPlazas) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Tipo Nombramiento</th>
                    <th>Plaza</th>
                    <th>Personal</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($personalPlazas as $personalPlaza)
                    <tr class="table-primary">
                        <td scope="row">{{ $personalPlaza->id }}</td>
                        <td>{{ $personalPlaza->tipoNombramiento }}</td>
                        <td>{{ $personalPlaza->plaza->nombrePlaza }}</td>
                        <td>{{ $personalPlaza->personal->nombres }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('personalPlazas.edit', $personalPlaza->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('personalPlazas.show', $personalPlaza->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('personalPlazas.show', $personalPlaza->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('personalPlazas.create') }}">Nuevo</a>
        {{ $personalPlazas->links() }}
    </div>
    <hr>