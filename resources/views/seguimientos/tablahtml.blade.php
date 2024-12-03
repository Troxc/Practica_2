    <!--  @ dd($seguimientos) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Descripcion</th>
                    <th>Fecha INI</th>
                    <th>Fecha FIN</th>
                    <th>Periodo</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($seguimientos as $seguimiento)
                    <tr class="table-primary">
                        <td>{{ $seguimiento->desc }}</td>
                        <td>{{ $seguimiento->fechaIni }}</td>
                        <td>{{ $seguimiento->fechaFin }}</td>
                        <td>{{ $seguimiento->periodo->periodo }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('seguimientos.edit', $seguimiento->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('seguimientos.show', $seguimiento->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('seguimientos.show', $seguimiento->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('seguimientos.create') }}">Nuevo</a>
        {{ $seguimientos->links() }}
    </div>
