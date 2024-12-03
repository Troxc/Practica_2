    <!--  @ dd($plazas) MOSTRAR TODOS LOS DATOS EN UNA COLECCION-->
    <hr>
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id Plaza</th>
                    <th>Nombre</th>
                    <th>Archivo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($plazas as $plaza)
                    <tr class="table-primary">
                        <td scope="row">{{ $plaza->idPlaza }}</td>
                        <td>{{ $plaza->nombrePlaza }}</td>
                        <td>
                            @if ($plaza->archivo)
                                <a href="{{ route('plazas.showFile', $plaza->id) }}" target="_blank"
                                    class="badge bg-success">Ver Archivo PDF</a>
                            @else
                                <span class="badge bg-danger">No hay Archivo</span>
                            @endif
                        </td>
                        <td><a
                            name=""
                            id=""
                            class="btn btn-primary"
                            href="{{ route('plazas.word', $plaza->id) }}"
                            role="button"
                            >Descargar Formato</a
                        >
                        </td>
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
