<!-- Tabla -->
<div class="table-responsive-sm">
    <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-light">
            <tr>
                <th>Numero de Control</th>
                <th>Nombre Del Alumno</th>
                <th>Seguimiento 1</th>
                <th>Seguimiento 2</th>
                <th>Seguimiento 3</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($tutorados as $tutorado)
                <tr class="table-primary">
                    <td>{{$tutorado->alumno->noctrl}}</td>
                    <td>{{$tutorado->alumno->nombre}} {{$tutorado->alumno->apellidoM}} {{$tutorado->alumno->apellidoP}}</td>
                    <td>
                        @if ($tutorado->seguimiento1)
                            <a href="{{ route('verturores.verDocumento', ['tutorado' => $tutorado->id, 'campo' => 'seguimiento1']) }}" 
                               target="_blank" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#f28b82; color:#ffffff;">
                               Ver Archivo PDF
                            </a>
                        @else
                            <a href="{{ route('verturores.generarR', ['tutorado' => $tutorado->id, 'campo' => 'Primer Seguimiento']) }}" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#fbbc04; color:#000000;">
                               Generar Archivo
                            </a>
                            <a href="{{ route('verturores.verFormulario', ['tutorado' => $tutorado->id, 'campo' => 'seguimiento1']) }}" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#34a853; color:#ffffff;">
                               Subir Archivo
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($tutorado->seguimiento2)
                            <a href="{{ route('verturores.verDocumento', ['tutorado' => $tutorado->id, 'campo' => 'seguimiento2']) }}" 
                               target="_blank" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#f28b82; color:#ffffff;">
                               Ver Archivo PDF
                            </a>
                        @else
                            <a href="{{ route('verturores.generarR', ['tutorado' => $tutorado->id, 'campo' => 'Segundo Seguimiento']) }}" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#fbbc04; color:#000000;">
                               Generar Archivo
                            </a>
                            <a href="{{ route('verturores.verFormulario', ['tutorado' => $tutorado->id, 'campo' => 'seguimiento2']) }}" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#34a853; color:#ffffff;">
                               Subir Archivo
                            </a>
                        @endif
                    </td>
                    <td>
                        @if ($tutorado->seguimiento3)
                            <a href="{{ route('verturores.verDocumento', ['tutorado' => $tutorado->id, 'campo' => 'seguimiento3']) }}" 
                               target="_blank" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#f28b82; color:#ffffff;">
                               Ver Archivo PDF
                            </a>
                        @else
                            <a href="{{ route('verturores.generarR', ['tutorado' => $tutorado->id, 'campo' => 'Tercer Seguimiento']) }}" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#fbbc04; color:#000000;">
                               Generar Archivo
                            </a>
                            <a href="{{ route('verturores.verFormulario', ['tutorado' => $tutorado->id, 'campo' => 'seguimiento3']) }}" 
                               class="badge" 
                               style="display:block; margin-bottom:5px; background-color:#34a853; color:#ffffff;">
                               Subir Archivo
                            </a>
                        @endif
                    </td>
                                         
  
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tutorados->links() }}
</div>
<!-- Botón de Regresar -->
<div class="text-center mt-4">

    <a
        name=""
        id=""
        class="btn btn-primary"
        href="{{route('vertutores.index')}}"
        role="button"
        >Regresar</a
    >
    
</div>
