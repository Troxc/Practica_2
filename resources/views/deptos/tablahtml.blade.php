    <!--  @ dd($deptos) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID Depto</th>
                    <th>Nombre Depto</th>
                    <th>Nombre Mediano</th>
                    <th>Nombre Corto</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($deptos as $depto)
                    <tr class="table-primary">
                        <td scope="row">{{ $depto->idDepto }}</td>
                        <td>{{ $depto->nombreDepto }}</td>
                        <td>{{ $depto->nombreMediano }}</td>
                        <td>{{ $depto->nombreCorto }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('deptos.edit', $depto->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('deptos.show', $depto->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('deptos.show', $depto->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('deptos.create') }}">Nuevo</a>
        {{ $deptos->links() }}
    </div>
