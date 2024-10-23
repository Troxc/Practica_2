    <!--  @ dd($alumnos) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Num. Control</th>
                    <th>Nombre</th>
                    <th>Apellido P.</th>
                    <th>Apellido M.</th>
                    <th>Sexo</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($alumnos as $alumno)
                    <tr class="table-primary">
                        <td scope="row">{{ $alumno->noctrl }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidoP }}</td>
                        <td>{{ $alumno->apellidoM }}</td>
                        <td>{{ $alumno->sexo}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('alumnos.edit', $alumno->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('alumnos.show', $alumno->id) }}">
                                Eliminar
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('alumnos.show', $alumno->id) }}">
                                Ver
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <a class="btn btn-primary" href="{{ route('alumnos.create') }}">Nuevo</a>
        {{ $alumnos->links() }}
    </div>
