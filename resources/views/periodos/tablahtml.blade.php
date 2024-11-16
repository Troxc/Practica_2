    <!--  @ dd($periodos) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Periodo</th>
                    <th>Des Corta</th>
                    <th>Fecha INI</th>
                    <th>Fecha FIN</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($periodos as $periodo)
                    <tr class="table-primary">
                        <td>{{ $periodo->periodo }}</td>
                        <td>{{ $periodo->descCorta }}</td>
                        <td>{{ $periodo->fechaIni }}</td>
                        <td>{{ $periodo->fechaFin }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('periodos.edit', $periodo->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('periodos.show', $periodo->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('periodos.show', $periodo->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('periodos.create') }}">Nuevo</a>
        {{ $periodos->links() }}
    </div>
