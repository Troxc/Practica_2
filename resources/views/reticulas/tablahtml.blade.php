    <!--  @ dd($reticulas) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Descripcion</th>
                    <th>Fecha en Vigor</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($reticulas as $reticula)
                    <tr class="table-primary">
                        <td>{{ $reticula->descripcion }}</td>
                        <td>{{ $reticula->fechaVigor }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('reticulas.edit', $reticula->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('reticulas.show', $reticula->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('reticulas.show', $reticula->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('reticulas.create') }}">Nuevo</a>
        {{ $reticulas->links() }}
    </div>
