    <!--  @ dd($carreras) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID Carrera</th>
                    <th>Nombre Carrera</th>
                    <th>Nombre Mediano</th>
                    <th>Nombre Corto</th>
                    <th>DEPTO</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($carreras as $carrera)
                    <tr class="table-primary">
                        <td scope="row">{{ $carrera->idCarrera }}</td>
                        <td>{{ $carrera->nombreCarrera }}</td>
                        <td>{{ $carrera->nombreMediano }}</td>
                        <td>{{ $carrera->nombreCorto }}</td>
                        <td>{{ $carrera->depto->nombreDepto }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('carreras.edit', $carrera->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('carreras.show', $carrera->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('carreras.show', $carrera->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('carreras.create') }}">Nuevo</a>
        {{ $carreras->links() }}
    </div>
