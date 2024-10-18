    <!--  @ dd($puestos) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id Puesto</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($puestos as $puesto)
                    <tr class="table-primary">
                        <td scope="row">{{ $puesto->idPuesto }}</td>
                        <td>{{ $puesto->nombre }}</td>
                        <td>{{ $puesto->tipo }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('puestos.edit', $puesto->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('puestos.show', $puesto->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('puestos.show', $puesto->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('puestos.create') }}">Nuevo</a>
        {{ $puestos->links() }}
    </div>
