@extends('plantillas/plantilla')

@section('contenido')
<br><br>
<br><br>
<div class="text-center p-4 bg-white shadow rounded">
    <h1 class="mb-4">SELECCIONAR ARCHIVO</h1>
    <form action="{{route('verturores.guardar', ['tutorado' => $tutorado->id, 'campo' => $campo])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="file" class="form-control" name="archivo" id="archivo" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir Archivo</button>
    </form>
</div>
@endsection
